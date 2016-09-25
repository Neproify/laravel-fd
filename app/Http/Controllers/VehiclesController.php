<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Vehicle;
use App\VehicleDeparture;
use App\VehicleRefueling;
use Carbon\Carbon;
use View;
use PDF;

class VehiclesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Auth::User()->isPermittedEvenOrMore('vehicles', 1))
            return redirect('/');
        
        $vehicles = Auth::User()->vehicles;
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function show($id)
    {
        if(!Auth::User()->isPermittedEvenOrMore('vehicles', 1))
            return redirect('/');

        $vehicle = Vehicle::findOrFail($id);
        if(!$vehicle->users->contains(Auth::User()))
            return redirect('/vehicles');

        return view('vehicles.vehicle', ['vehicle' => $vehicle]);
    }

    public function addDeparture(Request $request, $id)
    {
        if(!Auth::User()->isPermittedEvenOrMore('vehicles', 2))
            return redirect('/');

        $vehicle = Vehicle::findOrFail($id);

        if(!$vehicle->users->contains(Auth::User()))
            return redirect('/vehicles');

        $departure = VehicleDeparture::create([
            'vehicle_id' => $vehicle->id,
            'date' => Carbon::createFromFormat('d-m-Y', $request->input('date')),
            'reason' => $request->input('reason'),
            'from' => $request->input('fromPlace'),
            'to' => $request->input('toPlace'),
            'supervisor' => $request->input('supervisorName'),
            'driver' => $request->input('driverName'),
            'departure' => $request->input('departureTime'),
            'return' => $request->input('returnTime'),
            'beforeMilage' => $request->input('beforeMilage'),
            'afterMilage' => $request->input('afterMilage'),
            'stopTime' => $request->input('stopTime')
        ]);

        return redirect(url('/vehicles', [$id]));
    }

    public function getDepartures(Request $request, $id)
    {
        return redirect(url('/vehicles', [$id, 'departures', $request->input('dateFrom'), $request->input('dateTo')]));
    }

    public function showDepartures($id, $from, $to)
    {
        if(!Auth::User()->isPermittedEvenOrMore('vehicles', 1))
            return redirect('/');
            
        $vehicle = Vehicle::findOrFail($id);
        
        if(!$vehicle->users->contains(Auth::User()))
            return redirect('/vehicles');

        $departures = VehicleDeparture::where('vehicle_id', $id)
            ->where('date', '>=', Carbon::createFromFormat('d-m-Y', $from)->subDay())
            ->where('date', '<=', Carbon::createFromFormat('d-m-Y', $to)->addDay())->get();

        $refuelings = VehicleRefueling::where('vehicle_id', $id)
            ->where('date', '>=', Carbon::createFromFormat('d-m-Y', $from)->subDay())
            ->where('date', '<=', Carbon::createFromFormat('d-m-Y', $to)->addDay())->get();
        //return View::make('vehicles.departures', ['departures' => $departures])->render();
        $pdf = PDF::loadView('vehicles.departures', ['departures' => $departures, 'refuelings' => $refuelings]);
        return $pdf->download('Karta pojazdu '. $from .'-'. $to .'.pdf');
    }

    public function addRefueling(Request $request, $id)
    {
        if(!Auth::User()->isPermittedEvenOrMore('vehicles', 2))
            return redirect('/');

        $vehicle = Vehicle::findOrFail($id);

        if(!$vehicle->users->contains(Auth::User()))
            return redirect('/vehicles');

        $refueling = VehicleRefueling::create([
            'vehicle_id' => $vehicle->id,
            'date' => Carbon::createFromFormat('d-m-Y', $request->input('date')),
            'milage' => $request->input('milage'),
            'type' => $request->input('typeOfFuel'),
            'count' => $request->input('countOfFuel')
        ]);

        return redirect(url('/vehicles', [$id]));
    }
}

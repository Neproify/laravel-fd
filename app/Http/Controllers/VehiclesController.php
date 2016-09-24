<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Vehicle;
use App\VehicleDeparture;
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
        $vehicles = Auth::User()->vehicles;
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.vehicle', ['vehicle' => $vehicle]);
    }

    public function addDeparture(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

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
        $departures = VehicleDeparture::where('vehicle_id', $id)
            ->where('date', '>=', Carbon::createFromFormat('d-m-Y', $from)->subDay())
            ->where('date', '<=', Carbon::createFromFormat('d-m-Y', $to)->addDay())->get();
        //return View::make('vehicles.departures', ['departures' => $departures])->render();
        $pdf = PDF::loadView('vehicles.departures', ['departures' => $departures]);
        return $pdf->download('Karta pojazdu '. $from .'-'. $to .'.pdf');
    }
}

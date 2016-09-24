<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\User;
use Redirect;

class VehiclesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $vehicles = Vehicle::all();

        return view('admin.vehicles.index', ['vehicles' => $vehicles]);
    }

    public function create()
    {
        $vehicle = Vehicle::create();

        return Redirect::to(url('/admin/vehicles/update', ['id' => $vehicle->id]));
    }

    public function updateForm($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $users = User::all();

        return view('admin.vehicles.edit', ['vehicle' => $vehicle, 'users' => $users]);
    }

    public function update(Request $request)
    {
        $vehicle = Vehicle::findOrFail($request->input('vehicle'));

        $vehicle->name = $request->input('name');

        $vehicle->combustion = $request->input('combustion');
        $vehicle->fuel = $request->input('fuel');
        $vehicle->milage = $request->input('milage');
        $vehicle->insurance = $request->input('insurance');
        $vehicle->inspection = $request->input('inspection');
        
        if(is_null($request->input('users')))
        {
            $vehicle->users()->sync([]);
        }  
        else
        {
            $vehicle->users()->sync($request->input('users'));
        }

        $vehicle->save();

        return redirect('/admin/vehicles');
    }
}

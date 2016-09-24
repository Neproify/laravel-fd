<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Redirect;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $role = Role::create([
            'name' => 'Nowa rola'
        ]);

        return Redirect::to(url('/admin/roles/update', ['id' => $role->id]));
    }

    public function updateForm($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:64'
        ]);

        $role = Role::findOrFail($request->input('role'));

        $role->name = $request->input('name');

        $role->admin = $request->input('admin');
        $role->announcments = $request->input('announcments');
        $role->training = $request->input('training');
        $role->members = $request->input('members');
        $role->statute = $request->input('statute');
        $role->equipment = $request->input('equipment');
        $role->vehicles = $request->input('vehicles');
        $role->fuel = $request->input('fuel');
        $role->conclusions = $request->input('conclusions');

        $role->save();

        return redirect('/admin/roles');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;

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

    /*public function updateForm($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }*/

    /*public function update(Request $request)
    {
        $this->validate($request, [
            'role' => 'required',
        ]);

        $user = User::findOrFail($request->input('user'));
        $role = Role::findOrFail($request->input('role'));

        $user->role_id = $role->id;
        $user->save();

        return redirect('/admin/users');
    }*/
}

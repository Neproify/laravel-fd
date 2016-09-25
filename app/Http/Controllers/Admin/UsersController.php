<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::paginate(15);

        return view('admin.users.index', ['users' => $users]);
    }

    public function updateForm($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'roles' => 'required',
        ]);

        $user = User::findOrFail($request->input('user'));

        $user->roles()->sync($request->input('roles'));
        $user->save();

        return redirect('/admin/users');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users');
    }
}

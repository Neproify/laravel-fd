<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Announcment;
use Auth;

class AnnouncmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Auth::User()->isPermittedEvenOrMore('announcments', 1))
            return redirect('/');

        $announcments = Announcment::all();
        return view('announcments.index', ['announcments' => $announcments]);
    }

    public function create(Request $request)
    {
        if(!Auth::User()->isPermittedEvenOrMore('announcments', 2))
            return redirect('/');

        $this->validate($request, [
            'title' => 'required|string|min:3|max:128',
            'content' => 'required|string|min:8|max:2048'
        ]);

        Announcment::create([
            'user_id' => Auth::User()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return redirect('/announcments');
    }

    public function delete($id)
    {
        if(!Auth::User()->isPermittedEvenOrMore('announcments', 3))
            return redirect('/');

        $announcment = Announcment::findOrFail($id);
        $announcment->delete();
        return redirect('/announcments');
    }
}

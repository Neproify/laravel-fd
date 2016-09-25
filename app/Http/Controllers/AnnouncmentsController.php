<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Announcment;
use Auth;

class AnnouncmentsController extends Controller
{
    public function index()
    {
        $announcments = Announcment::all();
        return view('announcments.index', ['announcments' => $announcments]);
    }

    public function create(Request $request)
    {
        Announcment::create([
            'user_id' => Auth::User()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return redirect('/announcments');
    }

    public function delete($id)
    {
        $announcment = Announcment::findOrFail($id);
        $announcment->delete();
        return redirect('/announcments');
    }
}

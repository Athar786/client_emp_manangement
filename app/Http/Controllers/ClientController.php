<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $data = Client::create([
            'name' => $request['name'],
            'user_id' => Auth::user()->id,
            'email' => $request['email'],
            'address' => $request['address'],
            'city' => $request['city'],
            'notes' => $request['notes'],
        ]);

        return redirect()->route('home')->with('success',"Client created Successfully");
    }
}

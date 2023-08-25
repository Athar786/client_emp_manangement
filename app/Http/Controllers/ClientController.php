<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {

    }
}

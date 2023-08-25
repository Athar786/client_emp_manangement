<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth','employee-access']);
    // }


    public function index()
    {
        
        // return view('employee.create');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        // ]);

        $randomPassword = Str::random(10);

        $hashedPassword = Hash::make($randomPassword);

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $hashedPassword,
        ]);
        
        $details = [
            'email' => $data->email,
            'password' => $randomPassword,
        ];
        
        \Mail::to($data->email)->send(new \App\Mail\MyPasswordMail($details));
        return redirect()->route('admin.home')->with('success',"Employee created Successfully");
    }
}

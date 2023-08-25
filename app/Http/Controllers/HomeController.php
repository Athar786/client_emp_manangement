<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::where('user_id',Auth::user()->id)->get();
        return view('home',compact('clients'));
    }

    public function adminHome(Request $request)
    {
        $data = User::role(0)->get();
        // if($request->ajax()) {
        //     return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('status',function($row) {
        //         $status = "<input data-id='{{$row->id}}' class='toggle-class' type='checkbox' data-onstyle='success' data-offstyle='danger' data-toggle='toggle' data-on='Active' data-off='InActive' {{ $row->status ? 'checked' : '' }}>";
        //         return $status;
        //     })
            
        //     ->rawColumns(['status'])
        //     ->make(true);
        // }
        return view('admin.home',compact('data'));
    }


    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}

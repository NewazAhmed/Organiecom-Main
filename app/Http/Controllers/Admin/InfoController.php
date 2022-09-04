<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
use Carbon\Carbon;

class InfoController extends Controller
{

//===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $info = Info::latest()->get();
        return view('admin.info.index', compact('info'));
    }


//========Info Store========
    public function info_store(Request $request){
     $request->validate([
        'phone'    => 'required',
        'email'    => 'required',
        'facebook' => 'required',
        'linkedin' => 'required',
        'twitter'  => 'required',
        'address'  => 'required',
     ]);

     Info::insert([
        'phone'      => $request->phone,
        'email'      => $request->email,
        'facebook'   => $request->facebook,
        'linkedin'   => $request->linkedin,
        'twitter'    => $request->twitter,
        'address'    => $request->address,
        'created_at' => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Info Added!');
      
    }

//======Brand Edit========
    public function info_edit($info_id){
        $info = Info::find($info_id);
        return view('admin.info.edit', compact('info'));
    }

//======Brand Update======
   
     public function info_update(Request $request){
        $update_data             =   Info::find($request->info_id);
        $update_data->phone      =   $request->phone;
        $update_data->email      =   $request->email;
        $update_data->facebook   =   $request->facebook;
        $update_data->linkedin   =   $request->linkedin;
        $update_data->twitter    =   $request->twitter;
        $update_data->address    =   $request->address;
        $update_data->updated_at =   Carbon::now();
        
        $update_data->save();
       
        return Redirect()->route('admin.info')->with('success','Info Updated!');
    }

//=====Brand Delete======

public function info_delete($info_id){
        $brand = Info::find($info_id)->delete();

        return Redirect()->back()->with('danger','Info Deleted!');
    }


}
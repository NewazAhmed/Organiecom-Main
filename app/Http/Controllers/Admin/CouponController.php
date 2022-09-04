<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{

//===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $coupon = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupon'));
    }


//========Coupon Store========
    public function coupon_store(Request $request){
     
     Coupon::insert([
        'coupon_name' => strtoupper($request->coupon_name),
        'discount'    => $request->discount,
        'created_at'  => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Coupon Added!');
      
    }

//======Coupon Edit========
    public function coupon_edit($coupon_id){
        $coupon = Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit', compact('coupon'));
    }

//======Coupon Update======
   
    public function coupon_update(Request $request){
        
        $coupon_id = $request->id;
        
        Coupon::findOrFail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'updated_at' => Carbon::now(),
       ]);
       
        return Redirect()->route('admin.coupon')->with('success','Coupon Updated!');
    }

//=====Coupon Delete======

    public function coupon_delete($coupon_id){
        $coupon = Coupon::findOrFail($coupon_id)->delete();

        return Redirect()->back()->with('danger','Coupon Deleted!');
    }

//=====Coupon Inactive Status=====
    public function coupon_inactive($coupon_id){
        Coupon::findOrFail($coupon_id)->update(['status' => 0]);

        return Redirect()->back()->with('danger','Coupon Inactivated!');
    }


//=====Coupon Active Status=====
    public function coupon_active($coupon_id){
        Coupon::findOrFail($coupon_id)->update(['status' => 1]);
        
        return Redirect()->back()->with('success','Coupon Activated!');
    }

}
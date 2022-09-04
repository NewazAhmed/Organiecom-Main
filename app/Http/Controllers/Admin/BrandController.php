<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{

//===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $brand = Brand::latest()->get();
        return view('admin.brand.index', compact('brand'));
    }


//========Brand Store========
    public function brand_store(Request $request){
     $request->validate([
        'brand_name' => 'required|unique:brands,brand_name',
     ]);

     Brand::insert([
        'brand_name' => $request->brand_name,
        'created_at'    => Carbon::now()
     ]);

     return Redirect()->back()->with('success','brand added!');
      
    }

//======Brand Edit========
    public function brand_edit($brand_id){
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit', compact('brand'));
    }

//======Brand Update======
   
     public function brand_update(Request $request){
        $update_data                  =   Brand::find($request->brand_id);
        $update_data->brand_name   =   $request->brand_name;
        $update_data->updated_at      =   Carbon::now();
        
        $update_data->save();
       
        return Redirect()->route('admin.brand')->with('success','Brand Updated!');
    }

//=====Brand Delete======

public function brand_delete($brand_id){
        $brand = Brand::find($brand_id)->delete();

        return Redirect()->back()->with('danger','Brand Deleted!');
    }

//=====Brand Inactive Status=====
    public function brand_inactive($brand_id){
        Brand::find($brand_id)->update(['status' => 0]);

        return Redirect()->back()->with('danger','Brand Inactivated!');
    }


//=====Brand Active Status=====
    public function brand_active($brand_id){
        Brand::find($brand_id)->update(['status' => 1]);
        
        return Redirect()->back()->with('success','Brand Activated!');
    }

}
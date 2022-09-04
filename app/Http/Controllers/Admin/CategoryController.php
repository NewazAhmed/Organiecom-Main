<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{

//===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $category= Category::where('status',1)->latest()->get();
        return view('admin.category.index', compact('category'));
    }


//========Category Store========
    public function category_store(Request $request){
     $request->validate([
        'category_name' => 'required|unique:categories,category_name',
     ]);

     Category::insert([
        'category_name' => $request->category_name,
        'created_at'    => Carbon::now()
     ]);

     return Redirect()->back()->with('success','category added!');
      
    }

//======Category Edit========
    public function category_edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

//======Category Update======
   
     public function category_update(Request $request){
        $update_data                  =   Category::find($request->category_id);
        $update_data->category_name   =   $request->category_name;
        $update_data->updated_at      =   Carbon::now();
        
        $update_data->save();
       
        return Redirect()->route('admin.category')->with('success','Category Updated!');
    }

//=====Category Delete======

public function category_delete($category_id){
        $category = Category::find($category_id)->delete();

        return Redirect()->back()->with('danger','Category Deleted!');
    }

//=====Category Inactive Status=====
    public function category_inactive($category_id){
        Category::find($category_id)->update(['status' => 0]);

        return Redirect()->back()->with('danger','Category Inactivated!');
    }


//=====Category Active Status=====
    public function category_active($category_id){
        Category::find($category_id)->update(['status' => 1]);
        
        return Redirect()->back()->with('success','Category Activated!');
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
Use Carbon\Carbon;

class BlogController extends Controller
{
    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $blog = Blog::latest()->get();
        return view('admin.blog.index', compact('blog'));
    }


//========Blog Store========
    public function blog_store(Request $request){
     $request->validate([
        'blog_category' => 'required|unique:brands,brand_name',
     ]);

     Blog::insert([
        'blog_category' => $request->blog_category,
        'created_at'    => Carbon::now()
     ]);

     return Redirect()->back()->with('success','blog added!');
      
    }

//======Blog Edit========
    public function blog_edit($blog_id){
        $blog = Blog::find($blog_id);
        return view('admin.blog.edit', compact('blog'));
    }

//======Blog Update======
   
     public function blog_update(Request $request){
        $update_data                  =   Blog::find($request->blog_id);
        $update_data->blog_category   =   $request->blog_category;
        $update_data->updated_at      =   Carbon::now();
        
        $update_data->save();
       
        return Redirect()->route('admin.blog')->with('success','Blog Updated!');
    }

//=====Blog Delete======

public function blog_delete($blog_id){
        $blog = Blog::find($blog_id)->delete();

        return Redirect()->back()->with('danger','Blog Deleted!');
    }

//=====Blog Inactive Status=====
    public function blog_inactive($blog_id){
        Blog::find($blog_id)->update(['status' => 0]);

        return Redirect()->back()->with('danger','Blog Inactivated!');
    }


//=====Blog Active Status=====
    public function blog_active($blog_id){
        Blog::find($blog_id)->update(['status' => 1]);
        
        return Redirect()->back()->with('success','Blog Activated!');
    }


}

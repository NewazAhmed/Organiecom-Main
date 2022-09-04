<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;

class BannerController extends Controller
{
    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //===So that no one can access here without login===

    public function index(){
        $banner = Banner::all();
        
        return view('admin.banner.add', compact('banner'));
    }

    //========Banner Store========
    public function banner_store(Request $request){
    //dd($request->all());

    //Validation Part and after "," Custom Error Message Part...
    $request->validate([
            'title'       => 'required|max:255',
            'subtitle'    => 'required|max:255',
            'image_one'   => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'image_one.required'   => 'The image field is required.',
        ]);

    //for multiple image upload...after usining image intervetion package...
        $imag_one = $request->file('image_one');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;


     //Banner Insertion...
     Banner::insert([
        'title'      => $request->title,
        'subtitle'      => $request->subtitle,
        'image_one'         => $img_url1,
        'created_at'        => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Product Added!');
    }


    //======Banner Manage======
    public function banner_manage(){
        //$product = Product::latest()->get();
        //alternative of this...
       $banner = Banner::orderBy('id','DESC')->get();
       //dd($product);
        return view('admin.banner.manage', compact('banner'));
    }


    //======Banner Edit========
    public function banner_edit($banner_id){
        $banner = Banner::findOrFail($banner_id);
        return view('admin.banner.edit', compact('banner'));
    }

    //======Banner Data Update======
   
     public function banner_data_update(Request $request){

        $banner_id = $request->banner_id;
        Banner::findOrFail($banner_id)->Update([
        
        'title'      => $request->title,
        'subtitle'   => $request->subtitle,
        'updated_at' => Carbon::now()
     ]);

     return Redirect()->route('admin.banner.manage')->with('success','Product Data Updated!');
        
    }


    //======Banner Image Update======

    public function banner_image_update(Request $request){

        $banner_id = $request->id;
        $old_one = $request->img_one;

        
         if ($request->has('image_one')) {
             unlink($old_one);

            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Banner::findOrFail($banner_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);
 
             return Redirect()->route('admin.banner.manage')->with('success','image successfully Updated');
         }

        }


        //=====Banner Delete======

        public function banner_delete($banner_id){
                $banner = Banner::find($banner_id)->delete();

                return Redirect()->back()->with('danger','Banner Deleted!');
            }


        //=====Banner Inactive Status=====
        public function banner_inactive($banner_id){
            Banner::find($banner_id)->update(['status' => 0]);

            return Redirect()->back()->with('danger','Banner Inactivated!');
        }


        //=====Banner Active Status=====
        public function banner_active($banner_id){
            Banner::find($banner_id)->update(['status' => 1]);
            
            return Redirect()->back()->with('success','Banner Activated!');
        }

}

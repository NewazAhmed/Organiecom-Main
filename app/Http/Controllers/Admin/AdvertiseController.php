<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Advertise;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;

class AdvertiseController extends Controller
{
    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //===So that no one can access here without login===

    public function index(){
        $advertise = Advertise::latest()->get();
        return view('admin.advertise.add', compact('advertise'));
    }

    //========Advertise Store========
    public function advertise_store(Request $request){
    //dd($request->all());

    //Validation Part and after "," Custom Error Message Part...
    $request->validate([
            'image_one'         => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'image_one.required'   => 'The main thumbnail field is required.',
        ]);

    //for multiple image upload...after usining image intervetion package...
        $imag_one = $request->file('image_one');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;

        

        
     //Advertise Insertion...
     Advertise::insert([
        'image_one'         => $img_url1,
        
        'created_at'        => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Product Added!');
    }


    //======Advertise Manage======
    public function advertise_manage(){
        //$product = Product::latest()->get();
        //alternative of this...
       $advertise = Advertise::orderBy('id','DESC')->get();
       //dd($product);
        return view('admin.advertise.manage', compact('advertise'));
    }


    //======Advertise Edit========
    public function advertise_edit($advertise_id){
        $advertise = Advertise::findOrFail($advertise_id);
        return view('admin.advertise.edit', compact('advertise'));
    }

    //======Advertise Image Update======

    public function advertise_image_update(Request $request){

        $advertise_id = $request->id;
        $old_one = $request->img_one;
       


         //update all three or two images together(need to place this before all other image updation code)
         if ($request->has('image_one')) {
             unlink($old_one);
             unlink($old_two);

            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);
             

 
 
             return Redirect()->route('admin.product.manage')->with('success','image successfully Updated');
         }



        


        //image-1...  
        if ($request->has('image_one')) {
           unlink($old_one);
            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('admin.product.manage')->with('success','image successfully Updated');
        }
  
        }


        //=====Advertise Delete======

        public function advertise_delete($advertise_id){
                $product = Advertise::find($advertise_id)->delete();

                return Redirect()->back()->with('danger','Advertise Deleted!');
            }


        //=====Advertise Inactive Status=====
        public function advertise_inactive($advertise_id){
            Advertise::find($advertise_id)->update(['status' => 0]);

            return Redirect()->back()->with('danger','Advertise Inactivated!');
        }


        //=====Advertise Active Status=====
        public function advertise_active($advertise_id){
            Advertise::find($product_id)->update(['status' => 1]);
            
            return Redirect()->back()->with('success','Advertise Activated!');
        }


}

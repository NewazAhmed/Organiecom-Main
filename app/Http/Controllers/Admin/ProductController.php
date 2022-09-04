<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
//Use Image;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;


class ProductController extends Controller
{

    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //===So that no one can access here without login===

    public function index(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.product.add', compact('category','brand'));
    }

    //========Product Store========
    public function product_store(Request $request){
    //dd($request->all());

    //Validation Part and after "," Custom Error Message Part...
    $request->validate([
            'product_name'      => 'required|max:255',
            'product_code'      => 'required|max:255',
            'price'             => 'required|max:255',
            'product_quantity'  => 'required|max:255',
            'category_id'       => 'required|max:255',
            'brand_id'          => 'required|max:255',
            'short_description' => 'required',
            'long_description'  => 'required',
            'image_one'         => 'required|mimes:jpg,jpeg,png,gif',
            'image_two'         => 'required|mimes:jpg,jpeg,png,gif',
            'image_three'       => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'The category name field is required.',
            'brand_id.required'    => 'The brand name field is required.',
            'image_one.required'   => 'The main thumbnail field is required.',
            'image_two.required'   => 'The first image field is required.',
            'image_three.required' => 'The second image field is required.',
        ]);

    //for multiple image upload...after usining image intervetion package...
        $imag_one = $request->file('image_one');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $img_url1 = 'frontend/img/product/upload/'.$name_gen;

        $imag_two = $request->file('image_two');                
        $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
        Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $img_url2 = 'frontend/img/product/upload/'.$name_gen;

        $imag_three = $request->file('image_three');                
        $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
        Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $img_url3 = 'frontend/img/product/upload/'.$name_gen;

     //Product Insertion...
     Product::insert([
        'category_id'       => $request->category_id,
        'brand_id'          => $request->brand_id,
        'product_name'      => $request->product_name,
        'product_slug'      => strtolower(str_replace(' ','-',$request->product_name)),
        'product_code'      => $request->product_code,
        'price'             => $request->price,
        'product_quantity'  => $request->product_quantity,
        'short_description' => $request->short_description,
        'long_description'  => $request->long_description,
        'image_one'         => $img_url1,
        'image_two'         => $img_url2,
        'image_three'       => $img_url3,
        'created_at'        => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Product Added!');
    }


    //======Product Manage======
    public function product_manage(){
        //$product = Product::latest()->get();
        //alternative of this...
       $product = Product::orderBy('id','DESC')->get();
       //dd($product);
        return view('admin.product.manage', compact('product'));
    }


    //======Product Edit========
    public function product_edit($product_id){
        $product = Product::findOrFail($product_id);
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.product.edit', compact('product','category','brand'));
    }

    //======Product Data Update======
   
     public function product_data_update(Request $request){

        $product_id = $request->product_id;
        Product::findOrFail($product_id)->Update([
        'category_id'       => $request->category_id,
        'brand_id'          => $request->brand_id,
        'product_name'      => $request->product_name,
        'product_slug'      => strtolower(str_replace(' ','-',$request->product_name)),
        'product_code'      => $request->product_code,
        'price'             => $request->price,
        'product_quantity'  => $request->product_quantity,
        'short_description' => $request->short_description,
        'long_description'  => $request->long_description,
        'updated_at'        => Carbon::now()
     ]);

     return Redirect()->route('admin.product.manage')->with('success','Product Data Updated!');
        
    }


    //======Product Image Update======

    public function product_image_update(Request $request){

        $product_id = $request->id;
        $old_one = $request->img_one;
        $old_two = $request->img_two;
        $old_three = $request->img_three;


         //update all three or two images together(need to place this before all other image updation code)
         if ($request->has('image_one') && $request->has('image_two') && $request->has('image_three')) {
             unlink($old_one);
             unlink($old_two);
             unlink($old_three);


            $imag_one = $request->file('image_one');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_one' => $img_url1,
                'updated_at' => Carbon::now(),
            ]);
             
            $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
            ]);

            $imag_three = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
            Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_three' => $img_url3,
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

        //image-2...
        if ($request->has('image_two')) {
           unlink($old_two);
            $imag_two = $request->file('image_two');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_two' => $img_url2,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('admin.product.manage')->with('success','image successfully Updated');
        }

        //image-3...
        if ($request->has('image_three')) {
           unlink($old_three);
            $imag_three = $request->file('image_three');                
            $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
            Image::make($imag_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $img_url3 = 'frontend/img/product/upload/'.$name_gen;

            Product::findOrFail($product_id)->update([
                'image_three' => $img_url3,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('admin.product.manage')->with('success','image successfully Updated');
        }


        


        
        }


        //=====Product Delete======

        public function product_delete($product_id){
                $product = Product::find($product_id)->delete();

                return Redirect()->back()->with('danger','Product Deleted!');
            }


        //=====Product Inactive Status=====
        public function product_inactive($product_id){
            Product::find($product_id)->update(['status' => 0]);

            return Redirect()->back()->with('danger','Product Inactivated!');
        }


        //=====Product Active Status=====
        public function product_active($product_id){
            Product::find($product_id)->update(['status' => 1]);
            
            return Redirect()->back()->with('success','Product Activated!');
        }



}
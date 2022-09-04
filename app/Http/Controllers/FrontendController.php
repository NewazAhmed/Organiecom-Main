<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Blog;
use App\Post;
use App\Contact;
use App\Subscribe;
use Carbon\Carbon;
use App\Banner;
use App\Advertise;
use App\Info;
use DB;

class FrontendController extends Controller
{
    public function index(){

        $product = Product::where('status',1)->latest()->get();
        $category = Category::where('status',1)->latest()->get();
        $banner = Banner::where('status',1)->latest()->get();
        $advertise = Advertise::where('status',1)->latest()->get();
        return view('user.index', compact('product','category', 'banner', 'advertise'));
    }



     public function shop_details($product_id){

        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $related_product = Product::where('category_id', $category_id)->where('id','!=',$product_id)->latest()->get();

        
        return view('user.shop-details', compact('product','related_product'));
    }

    public function shop_grid(){

        $product = Product::where('status',1)->latest()->get();
        $category = Category::where('status',1)->latest()->get();
        $product_paginate = Product::where('status',1)->latest()->paginate(3);

        return view('user.shop-grid', compact('product','category','product_paginate'));

    }

    public function category_grid($cat_id){

        $product = Product::latest()->get();

        $category = Category::where('status',1)->latest()->get();
        $product_paginate = Product::where('category_id',$cat_id)->latest()->paginate(3);

        return view('user.category-grid', compact('product','category','product_paginate'));

    }


    //Search...
    public function search(Request $request){
       $product = Product::where('product_name','like','%'.$request->input('query').'%')->first();
       return view('user.search',compact('product'));
    }
    


//=====blog=========
public function blogs(){
        $blog_id=request('blog_id');

            $query = DB::table('posts');
                    if($blog_id){
                       $query->where('blog_id',$blog_id);
                    }
            $blog_post=$query->paginate(2);
                    
        $blgs=DB::table('blogs')->get();

        $post = Post::first();
        
        return view('user.blog', compact('blog_post','blgs','post'));
    }

 
    public function blog_details($id) {
        $blog_post_detail = Post::where('id', $id)->first();
        return view('user.blog-details', compact('blog_post_detail'));
    }
//=====blog=========




    public function checkout(){
        return view('user.checkout');
    }

    public function contact(){
        $info = Info::first();
        return view('user.contact', compact('info'));
    }

    


    //========Contact Store========
    public function contact_store(Request $request){
     $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
     ]);

     Contact::insert([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
        'created_at'    => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Thanks for Contact Us!');
      
    }


    //========Email Store========
    public function email_store(Request $request){
     $request->validate([
        'email' => 'required',
     ]);

     Subscribe::insert([
        'email' => $request->email,
        'created_at'    => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Thanks for Subscribing Us!');
      
    }

}








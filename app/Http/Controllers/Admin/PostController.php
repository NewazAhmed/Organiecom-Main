<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
Use Carbon\Carbon;
use App\Post;
use App\Blog;

class PostController extends Controller
{
    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //===So that no one can access here without login===

    public function index(){
        $post = Post::latest()->get();
        $blog = Blog::latest()->get();
        return view('admin.post.add', compact('post','blog'));
    }

    //========Post Store========
    public function post_store(Request $request){
    //dd($request->all());

    //Validation Part and after "," Custom Error Message Part...
    $request->validate([
            'blog_id'          => 'required|max:255',
            'post_name'        => 'required|max:255',
            'post_description' => 'required',
            'author_name'      => 'required|max:255',
            'post_image'       => 'required|mimes:jpg,jpeg,png,gif',
            'author_image'     => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            
            'blog_id.required'   => 'The Blog Category field is required.',
            'post_name.required' => 'The Post Name field is required.',
            'post_description.required'    => 'The Post Description field is required.',
            'author_name.required'   => 'The Author Name field is required.',
            'post_image.required' => 'The Post Image field is required.',
            'author_image.required' => 'The Author Image field is required.',
        ]);

    //for multiple image upload...after usining image intervetion package...
        $post_imag = $request->file('post_image');                
        $name_gen = hexdec(uniqid()).'.'.$post_imag->getClientOriginalExtension();
        Image::make($post_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $post_image_url = 'frontend/img/product/upload/'.$name_gen;

        $author_imag = $request->file('author_image');                
        $name_gen = hexdec(uniqid()).'.'.$author_imag->getClientOriginalExtension();
        Image::make($author_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
        $author_image_url = 'frontend/img/product/upload/'.$name_gen;

     //Post Insertion...
     Post::insert([
        'blog_id'          => $request->blog_id,
        'post_name'        => $request->post_name,
        'author_name'      => $request->author_name,
        'post_slug'        => strtolower(str_replace(' ','-',$request->post_name)),
        'post_description' => $request->post_description,
        'post_image'       => $post_image_url,
        'author_image'     => $author_image_url,
        'created_at'       => Carbon::now()
     ]);

     return Redirect()->back()->with('success','Post Added!');
    }


    //======Post Manage======
    public function post_manage(){
        //$product = Product::latest()->get();
        //alternative of this...
       $post = Post::orderBy('id','DESC')->get();
       //dd($product);
        return view('admin.post.manage', compact('post'));
    }


    //======Post Edit========
    public function post_edit($post_id){
        $post = Post::findOrFail($post_id);
        $blog = Blog::latest()->get();
        return view('admin.post.edit', compact('post','blog'));
    }

    //======Post Data Update======
   
     public function post_data_update(Request $request){

        $post_id = $request->post_id;
        Post::findOrFail($post_id)->Update([
        'blog_id'          => $request->blog_id,
        'post_name'        => $request->post_name,
        'post_slug'        => strtolower(str_replace(' ','-',$request->post_name)),
        'post_description' => $request->post_description,
        'author_name'      => $request->author_name,
        'updated_at'       => Carbon::now()
     ]);

     return Redirect()->route('admin.post.manage')->with('success','Post Data Updated!');
        
    }


    //======Post Image Update======

    public function post_image_update(Request $request){

        $post_id = $request->id;
        $old_one = $request->post_img;
        $old_two = $request->author_img;


         //update all two images together(need to place this before all other image updation code)
         if ($request->has('post_image') && $request->has('author_image')) {
             unlink($old_one);
             unlink($old_two);


            $post_imag = $request->file('post_image');                
            $name_gen = hexdec(uniqid()).'.'.$post_imag->getClientOriginalExtension();
            Image::make($post_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $post_image_url = 'frontend/img/product/upload/'.$name_gen;

            Post::findOrFail($post_id)->update([
                'post_image' => $post_image_url,
                'updated_at' => Carbon::now(),
            ]);
             
            $author_imag = $request->file('author_image');                
            $name_gen = hexdec(uniqid()).'.'.$author_imag->getClientOriginalExtension();
            Image::make($author_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $author_image_url = 'frontend/img/product/upload/'.$name_gen;

            Post::findOrFail($post_id)->update([
                'author_image' => $author_image_url,
                'updated_at' => Carbon::now(),
            ]);
 
 
             return Redirect()->route('admin.post.manage')->with('success','image successfully Updated');
         }



        


        //image-1...  
        if ($request->has('post_image')) {
           unlink($old_one);
            $post_imag = $request->file('post_image');                
            $name_gen = hexdec(uniqid()).'.'.$post_imag->getClientOriginalExtension();
            Image::make($post_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $post_image_url = 'frontend/img/product/upload/'.$name_gen;

            Post::findOrFail($post_id)->update([
                'post_image' => $post_image_url,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('admin.post.manage')->with('success','image successfully Updated');
        }

        //image-2...
        if ($request->has('author_image')) {
           unlink($old_two);
            $author_imag = $request->file('author_image');                
            $name_gen = hexdec(uniqid()).'.'.$author_imag->getClientOriginalExtension();
            Image::make($author_imag)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);       
            $author_image_url = 'frontend/img/product/upload/'.$name_gen;

            Post::findOrFail($post_id)->update([
                'author_image' => $author_image_url,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('admin.post.manage')->with('success','image successfully Updated');
        }

        
        }


        //=====Post Delete======

        public function post_delete($post_id){
                $post = Post::find($post_id)->delete();
                return Redirect()->back()->with('danger','Post Deleted!');
            }


        //=====Post Inactive Status=====
        public function post_inactive($post_id){
            Post::find($post_id)->update(['status' => 0]);

            return Redirect()->back()->with('danger','Post Inactivated!');
        }


        //=====Post Active Status=====
        public function post_active($post_id){
            Post::find($post_id)->update(['status' => 1]);
            
            return Redirect()->back()->with('success','Post Activated!');
        }


}

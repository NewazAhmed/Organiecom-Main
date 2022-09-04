<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Wishlist;

class WishlistController extends Controller
{
    public function add_to_wishlist($product_id){

            if(Auth::check()){

            $check = Wishlist::where('product_id',$product_id)->where('user_id',Auth::id())->first();
            if($check){
            return Redirect()->back()->with('danger','Product Already Added To Wishlist');
            }else{
            Wishlist::insert([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
            ]);
            return Redirect()->back()->with('success','Product Added To Wishlist');
           }

               
        }



        else{
            return Redirect()->back()->with('danger','Please Regester and Login to your Account');    
            
        }
    }

    

    public function index(){
        $wishlist = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('user.wishlist', compact('wishlist'));
    }

    public function destroy_wishlist($wishlist_id){
        
        Wishlist::where('id',$wishlist_id)->where('user_id', Auth::id())->delete();

        return Redirect()->back()->with('danger','Wishlist Product Removed!');
     }

}









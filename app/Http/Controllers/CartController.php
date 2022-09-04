<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;

use Session;
//use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function add_to_cart(Request $request, $product_id){
        
        $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
        if($check){
            Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
            return Redirect()->back()->with('success','Product Added To Cart');
        }else{
             Cart::insert([
            'product_id' => $product_id,
            'qty' => 1,
            'price' => $request->price,
            'user_ip' => request()->ip(),
        ]);
        return Redirect()->back()->with('success','Product Added To Cart');
        }

    }


    public function shoping_cart(){
        $cart = Cart::where('user_ip',request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($total){return $total->price * $total->qty;});
        return view('user.shoping-cart', compact('cart','total'));
    }

     public function destroy_cart($cart_id){
        
        Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();

        return Redirect()->back()->with('danger','Cart Product Removed!');
     }

     public function qty_update_cart(Request $request, $cart_id){
        Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
            'qty'=> $request->qty,
        ]);

        return Redirect()->back()->with('success','Product Quantity Updated!');
     }

     public function coupon_apply(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon_name)->first();
        if($check){
            //keep data in session...
            Session::put('coupon', [
                'coupon_name' => $check->coupon_name,
                'discount' => $check->discount,
            ]);

            return Redirect()->back()->with('Success','Coupon Applied!');
        }else{
            return Redirect()->back()->with('danger','Invalid Coupon!');
        }
     }


     public function destroy_coupon(){
        if(Session::has('coupon')){
            session()->forget('coupon');
             return Redirect()->back()->with('danger','Coupon Removed!');
        }
     }
}

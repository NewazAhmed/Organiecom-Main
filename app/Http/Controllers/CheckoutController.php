<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Shipping;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use Session;

class CheckoutController extends Controller
{

    public function index(){
        
            if(Auth::check()){
                $cart = Cart::where('user_ip',request()->ip())->latest()->get();
                $total = Cart::all()->where('user_ip',request()->ip())->sum(function($total){
                                        return $total->price * $total->qty;
                                      });
                                      
                return view('user.checkout', compact('cart','total'));    
            }else{
                return Redirect()->route('login');
            }
            
        }


    public function place_order(Request $request){

//dd($request->all());
        
        $request->validate([
            'ship_first_name' => 'required',
            'ship_last_name' => 'required',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'invoice_no' => mt_rand(10000000,99999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->discount,
            'created_at' => Carbon::now(),
        ]);

        $cart = Cart::where('user_ip',request()->ip())->latest()->get();
            foreach ($cart as $item ) {
          
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $item->product_id,
                    'product_qty' => $item->qty,
                    'created_at' => Carbon::now(),
                ]);

            }


            Shipping::insert([
                'order_id' => $order_id,
                'ship_first_name' => $request->ship_first_name,
                'ship_last_name' => $request->ship_last_name,
                'ship_email' => $request->ship_email,
                'ship_phone' => $request->ship_phone,
                'ship_address' => $request->ship_address,
                'ship_state' => $request->ship_state,
                'post_code' => $request->post_code,
                'created_at' => Carbon::now(),
            ]);

            if (Session::has('coupon')) {
                session()->forget('coupon');
             }

         Cart::where('user_ip',request()->ip())->delete();


            return Redirect()->back()->with('success','Your Order Succeffully Done');

}
}
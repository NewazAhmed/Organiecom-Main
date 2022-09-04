<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Shipping;
use App\OrderItem;

class OrderController extends Controller
{
    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $order = Order::latest()->get();
        return view('admin.order.index', compact('order'));
    }

    //=====Order Inactive Status=====
    public function order_done($order_id){
        Order::find($order_id)->update(['status' => 0]);

        return Redirect()->back()->with('danger','Order Pending!');
    }


//=====Order Active Status=====
    public function order_pending($order_id){
        Order::find($order_id)->update(['status' => 1]);
        
        return Redirect()->back()->with('success','Order Done!');
    }


    //=====View Order=====
    public function order_view($order_id){
        $order = Order::findOrFail($order_id);
        $order_item = OrderItem::where('order_id', $order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();

        return view('admin.order.view', compact('order','order_item','shipping'));
    }

}

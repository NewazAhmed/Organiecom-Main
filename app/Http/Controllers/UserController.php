<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $order = Order::where('user_id',Auth::id())->latest()->get();
        return view('home', compact('order'));
    }

     //=====View Order=====
    public function order_view($order_id){
        $order = Order::findOrFail($order_id);
        $order_item = OrderItem::where('order_id', $order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();

        return view('view', compact('order','order_item','shipping'));
    }

}

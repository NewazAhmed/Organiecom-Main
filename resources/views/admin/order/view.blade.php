@extends('admin.backend-master')
@section('order') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Orders</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
      	<div class="col-4">
          <h5>Shipping</h5>
          <p><b>First Name: </b>{{$shipping->ship_first_name}}</p>          
          <p><b>Last Name: </b>{{$shipping->ship_last_name}}</p>          
          <p><b>Phone: </b>{{$shipping->ship_phone}}</p>          
          <p><b>Email: </b>{{$shipping->ship_email}}</p>          
          <p><b>Address: </b>{{$shipping->ship_address}}</p>   
          <p><b>State: </b>{{$shipping->ship_state}}</p>        
          <p><b>Post Code: </b>{{$shipping->post_code}}</p>
          <p><b>Address: </b>{{$shipping->created_at}}</p>         
        </div>

        <div class="col-4">
          <h5>Order</h5>
          <p><b>Payment Type: </b>{{$order->payment_type}}</p>
          <p><b>Total: </b>{{$order->total}}</p>
          <p><b>Subtotal: </b>{{$order->subtotal}}</p>
          <p><b>Discount: </b>{{$order->coupon_discount}}</p>
          <p><b>Status: </b>{{$order->status}}</p>
        </div>

        <div class="col-4">
          <h5>Order Item</h5>
          <ul>
            @foreach($order_item as $item)
            <li>
              <img src="{{asset($item->product->image_one)}}" alt="">
              <h6>{{$item->product->product_name}}</h6>
              <h6>{{$item->product_qty}}</h6>
            </li>
            @endforeach
          </ul>
        </div>
               
        </div>
   
      </div>
</div>

@endsection
@extends('user.frontend-master')
@section('frontend-content')
@section('hero')
hero-normal
@endsection


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        
        <div class="container">
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach($cart as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset($item->product->image_one)}}" height="80px" width="80px" alt="">
                                        <h5>{{$item->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$item->product->price}} BDT
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form id="frm" action="{{url('/cart/qty/update/'.$item->id)}}" method="POST">
                                                @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{$item->qty}}" min="1">
                                                <input type="hidden" name="price" value="{{$item->product->price}}">
                                            </div>
                                            <button style="width: 84px;height: 40px;border: none;font-size: 16px;background: #f5f5f5;color: #1c1c1c;text-align: center;display: inline-block;" type="update">Update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{$item->price * $item->qty}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        
                                            <a href="{{url('cart/destroy/'.$item->id)}}" title=""><span class="icon_close"> </span></a>
                                       
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__continue">

                        <!--if the session has coupon or coupon has benn applied then vanish the coupon apply field, else show the field-->
                        @if(Session::has('coupon'))
                        @else
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{url('/coupon-apply')}}" method="POST">
                                @csrf
                                <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @if(Session::has('coupon'))
                              <li>Subtotal <span>{{$total}} BDT</span></li>
                              <li>Discount <span>{{session()->get('coupon')['discount']}} % ( -{{ $discount = $total * session()->get('coupon')['discount'] / 100 }} BDT )</span></li>

                              <li>Coupon Name <span>{{session()->get('coupon')['coupon_name']}}</span> <a href="{{url('coupon-destroy')}}" title="">x</a></li>

                              <li>Total <span>{{$total - $discount}} BDT</span></li>
                            @else
                              <li>Total <span>{{$total}} BDT</span></li>
                            @endif
                              
                        </ul>
                        <a href="{{url('/checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@endsection
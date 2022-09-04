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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
               
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                
                <form action="{{route('place-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input value="{{Auth::user()->name}}" type="text" name = "ship_first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="ship_last_name">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                
                                <input type="text" name="ship_address">
                            </div>
                            
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="ship_state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="ship_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input value="{{Auth::user()->email}}"  type="text" name="ship_email">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                           
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                   @foreach ($cart as $item)
                                    <li>{{  $item->product->product_name }} ({{ $item->qty }}) <span>${{ $item->price * $item->qty }}</span></li>
                                    @endforeach
                                </ul>
                               

                                 @if(Session::has('coupon'))
                                <div class="checkout__order__subtotal">Subtotal <span>{{$total}} BDT</span></div>
                                <input type="hidden" name="subtotal" value="{{$total}}">
                                
                                <div class="checkout__order__subtotal">Discount <span>{{session()->get('coupon')['discount']}} % ( -{{ $discount = $total * session()->get('coupon')['discount'] / 100 }} BDT )</span></div>
                                <input type="hidden" name="discount" value="{{session()->get('coupon')['discount']}} % ( -{{ $discount = $total * session()->get('coupon')['discount'] / 100 }} BDT )">
                                
                                <div class="checkout__order__subtotal">Coupon Name <span>{{session()->get('coupon')['coupon_name']}}</span></div>
                                <input type="hidden" name="coupon_name" value="{{session()->get('coupon')['coupon_name']}}">

                                <div class="checkout__order__total">Total <span>{{$total - $discount}} BDT</span></div>
                                <input type="hidden" name="total" value="{{$total - $discount}}">
                                
                                @else
                                <div class="checkout__order__total">Total <span>{{$total}} BDT</span></div>
                                <input type="hidden" name="total" value="{{$total}}">
                                @endif
                                
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Hand Cash
                                        <input type="checkbox" id="payment" name="payment_type" value="handcash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Others
                                        <input type="checkbox" id="paypal" name="payment_type" value="others">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   @endsection
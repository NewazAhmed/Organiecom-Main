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
                                    <th>Cart</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($wishlist as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset($item->product->image_one)}}" height="80px" width="80px" alt="">
                                        <h5>{{$item->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$item->product->price}} BDT
                                    </td>
                                     <td class="shoping__cart__price">
                                        <form action="{{url('add-to-cart/'.$item->product->id)}}" method="POST">
                                        @csrf
                                        
                                        <button type="submit">Add to Cart</button>
                                    </form>
                                    </td>
                                  
                                    <td class="shoping__cart__item__close">
                                        
                                            <a href="{{url('/wishlist/destroy/'.$item->id)}}" title=""><span class="icon_close"> </span></a>
                                       
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
                
                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@endsection
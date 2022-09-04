<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" type="text/css">
</head>

<body>
    <style>
      .btn-stl, input[type="submit"], input[type="reset"] {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
        }

      .featured__item__pic__hover li a {
        position: relative;
        bottom: 77px;
        }



    </style>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <!-- Mobile View -->
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('frontend')}}/css/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('frontend')}}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('homepage')}}">Home</a></li>
                <li><a href="{{route('shop_grid')}}">Shop</a></li>
                
                <li><a href="{{route('blogs')}}">Blog</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Mobile View End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                @php
                                 $info = \App\Info::first();
                                @endphp
                                <li><i class="fa fa-envelope"></i> {{$info->email}}</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                @php
                                 $info = \App\Info::first();
                                @endphp
                                <a href="{{$info->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$info->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{$info->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                
                            </div>


                            <div class="header__top__right__language">
                                <i class="fa fa-user"> </i>
                                @auth
                                <div>{{ Auth::user()->name }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{{route('home')}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}</a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form></li>
                                </ul>
                                @else
                                <a style="color:black" href="{{route('login')}}"> Login | Register</a>
                                @endauth
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!--Success Message Starts-->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        @endif
                     <!--Success Message Ends-->
                     <!--Danger Message Starts-->
                        @if(session('danger'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{session('danger')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        @endif
                     <!--Danger Message Ends-->
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('homepage')}}"><img src="{{asset('frontend')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a  href="{{route('homepage')}}">Home</a></li>
                            <li><a href="{{route('shop_grid')}}">Shop</a></li>
                            
                            
                            <li><a  href="{{route('blogs')}}">Blog</a></li>
                            <li><a  href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        @php
                          $total = \App\Cart::all()->where('user_ip',request()->ip())->sum(function($total){
                            return $total->price * $total->qty;
                          });

                          $quantity = \App\Cart::all()->where('user_ip',request()->ip())->sum('qty');

                          $wish_qty = \App\Wishlist::where('user_id',Auth::id())->get();
                        @endphp

                        <!--$wish_qtyy = \App\Wishlist::all()->where('user_id',Auth::id())->sum('qty');-->
                        <ul>
                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> <span>{{count($wish_qty)}}</span></a></li>
                            <li><a href="{{ route('shoping_cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{$quantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">Price: <span>{{$total}} BDT</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

        <!-- Hero Section Begin -->
    <section class="hero @yield('hero')">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @php
                               $category= \App\Category::where('status',1)->latest()->get();
                            @endphp

                            @foreach ($category as $item)
                               <li><a href="{{url('/category-grid/'.$item->id)}}">{{$item->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}" method="GET">
                                <!--<div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>-->
                                <input type="text" name="query" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                @php
                                 $info = \App\Info::first();
                                @endphp
                                <h5>{{$info->phone}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    @yield('banner')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('frontend-content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('frontend')}}/css/img/logo.png" alt=""></a>
                        </div>
                        <ul>@php
                             $info = \App\Info::first();
                            @endphp
                            <li>Address: {{$info->address}}</li>
                            <li>Phone: {{$info->phone}}</li>
                            <li>Email: {{$info->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="{{route('email-submit')}}" method="POST">
                            @csrf
                            <input type="text" name="email" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            @php
                             $info = \App\Info::first();
                            @endphp
                            <a href="{{$info->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$info->linkedin}}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$info->twitter}}"><i class="fa fa-twitter"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Soft IT Security
  </p></div>
                        <div class="footer__copyright__payment"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <!--<script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        jQuery('#frm').submit(function(e){
            e.preventDefault();
            jQuery.ajax({
                url:"{{url('add-to-cart/{product_id}')}}",
                data:jQuery('#frm').serialize(),
                type:'post',
                success:function(result){
                    console.log(result);
                }
            });
        });
    </script>

    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('frontend')}}/js/mixitup.min.js"></script>
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/main.js"></script>

  
     

</body>

</html>
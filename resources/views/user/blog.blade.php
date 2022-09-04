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
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <!--<div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>-->
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                               @foreach($blgs as $item)
                                <li><a href="{{ route('blogs')}}?blog_id={{$item->id}}">{{$item->blog_category}}</a></li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @php
                                $post = \App\Post::where('status',1)->latest()->limit(5)->get();
                                @endphp
                               @foreach($post as $item)
                                <a href="{{route('blog-details',[$item->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset($item->post_image)}}" height="50px" width="50" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$item->post_name}}</h6>
                                        <span>{!!Str::limit($item->post_description,10)!!}</span>
                                    </div>
                                </a>
                               @endforeach
                            </div>
                        </div>
                        <!--<div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                      @foreach($blog_post as $item)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset($item->post_image)}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    
                                    <h5><a href="#">{{$item->post_name}}</a></h5>
                                    <p>{!!Str::limit($item->post_description,10)!!}</p><br>
                                    <a href="{{route('blog-details',[$item->id])}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                       @endforeach
                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                {{$blog_post->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection    
@extends('admin.backend-master')
@section('brand') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
      
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit & Update Blog
                </div>

                <div class="card-body">


                    <form action="{{route('blog.update')}}" method="POST">
                        @csrf
                        @php
                         $blog = \App\Blog::latest()->get();
                        @endphp
                        <input type="hidden" value="{{$blog->id}}" name="blog_id">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Blog</label>
                          <input type="text" value="{{$blog->blog_category}}" name="blog_category" class="form-control @error('blog_category') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Blog Category">

                          @error('blog_category')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
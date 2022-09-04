@extends('admin.backend-master')
@section('category') active @endsection
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
                <div class="card-header">Edit & Update Category
                </div>

                <div class="card-body">

                    <form action="{{route('category.update')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$category->id}}" name="category_id">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Category</label>
                          <input type="text" value="{{$category->category_name}}" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                          @error('category_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Update Category</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
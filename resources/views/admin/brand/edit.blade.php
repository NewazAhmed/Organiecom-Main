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
                <div class="card-header">Edit & Update Brand
                </div>

                <div class="card-body">

                    <form action="{{route('brand.update')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$brand->id}}" name="brand_id">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Brand</label>
                          <input type="text" value="{{$brand->brand_name}}" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                          @error('brand_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Update Brand</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
@extends('admin.backend-master')
@section('coupon') active @endsection
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
                <div class="card-header">Edit & Update Coupon
                </div>

                <div class="card-body">


                    <form action="{{route('coupon.update')}}" method="POST">
                        @csrf

                        <input type="hidden" value="{{$coupon->id}}" name="id">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Coupon</label>
                          <input type="text" value="{{$coupon->coupon_name}}" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon">

                          @error('coupon_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <div class="form-group">
                          <label for="exampleInputEmail1">Edit Discount</label>
                          <input type="text" value="{{$coupon->discount}}" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Coupon">

                          @error('discount')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Update Coupon</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
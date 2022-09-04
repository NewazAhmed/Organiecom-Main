@extends('admin.backend-master')
@section('brand') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>

      <div class="sl-pagebody">
      	<div class="mb-4" >

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
        </div>
        <div class="row row-sm">

         <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Brand
                </div>


        <div class="card pd-20 pd-sm-40">
          <h6 class="mb-4 card-body-title">See and Search Brand</h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Serial No</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
              	
              	@php
                   $i = 1;
              	@endphp

              	@foreach($brand as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$item->brand_name}}</td>

                  <td>
                  	@if($item->status == 1)
                  	<span class="badge badge-success">Active</span>
                  	@else
                  	<span class="badge badge-danger">Inactive</span>
                  	@endif
                  </td>
                  
                  <td>
                  	<a href="{{url('admin/brand/edit/'.$item->id)}}" class="btn-sm btn-success">Edit</a>
                  	<a href="{{url('admin/brand/delete/'.$item->id)}}" class="btn-sm btn-danger">Delete</a>
                  	@if($item->status == 1)
                  	<a href="{{url('admin/brand/inactive/'.$item->id)}}" class="btn-sm btn-info">Make Inactive</a>
                  	@else
                  	<a href="{{url('admin/brand/active/'.$item->id)}}" class="btn-sm btn-warning">Make Active</a>
                  	@endif
                  </td>

                </tr>
                @endforeach

                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Brand
                </div>

                <div class="card-body">

                    <form action="{{route('brand.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          
                          <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand">

                          @error('brand_name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Add Brand</button>
                    </form>
                </div>
            </div>

        </div>
</div>
</div>

@endsection
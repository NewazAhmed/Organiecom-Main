@extends('admin.backend-master')
@section('info') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Info</span>
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

         <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Info
                </div>


        <div class="card pd-20 pd-sm-40">
          <h6 class="mb-4 card-body-title">See and Search Info</h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Serial No</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Facebook</th>
                  <th class="wd-15p">Twitter</th>
                  <th class="wd-15p">Linkedin</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
              	
              	@php
                   $i = 1;
              	@endphp

              	@foreach($info as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->facebook}}</td>
                  <td>{{$item->twitter}}</td>
                  <td>{{$item->linkedin}}</td>
                  <td>{{$item->address}}</td>
                  <td>
                  	<a href="{{url('admin/info/edit/'.$item->id)}}" class="btn-sm btn-success">Edit</a>
                  	<a href="{{url('admin/info/delete/'.$item->id)}}" class="btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach

                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Info
                </div>

                <div class="card-body">

                    <form action="{{route('info.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          
                          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">

                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">

                          @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook Link">

                          @error('facebook')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter linkedin Link">

                          @error('linkedin')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter twitter Link">

                          @error('twitter')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">

                          @error('address')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>
                        <button type="submit" class="btn btn-info">Add Info</button>
                    </form>
                </div>
            </div>

        </div>
</div>
</div>

@endsection
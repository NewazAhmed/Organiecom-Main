@extends('admin.backend-master')
@section('contact') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Message</span>
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
                <div class="card-header">All Contact Message
                </div>


        <div class="card pd-20 pd-sm-40">
          <h6 class="mb-4 card-body-title">See and Search Message</h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Serial No</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Email</th>
                  <th class="wd-15p">Message</th>
                </tr>
              </thead>
              <tbody>
              	
              	@php
                   $i = 1;
              	@endphp

              	@foreach($contact as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->message}}</td>
                  
                  
                  <td>
                  	<a href="{{url('admin/contact/view/'.$item->id)}}" class="btn-sm btn-info">View</a>
                  	<a href="{{url('admin/contact/delete/'.$item->id)}}" class="btn-sm btn-danger">Delete</a>
                  	
                  </td>

                </tr>
                @endforeach

                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
            </div>
        </div>

        
</div>
</div>

@endsection
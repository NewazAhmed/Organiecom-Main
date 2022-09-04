@extends('admin.backend-master')
@section('order') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Orders</span>
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
                <div class="card-header">Order List
                </div>


        <div class="card pd-20 pd-sm-40">
          <h6 class="mb-4 card-body-title">See and Search Coupon</h6>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Serial No</th>
                  <th class="wd-15p">#Invoice No</th>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Subtotal</th>
                  <th class="wd-20p">Discount</th>
                  <th class="wd-15p">Total</th>
                  <th class="wd-15p">Order Date & Time</th>
                  <th class="wd-15p">View</th>
                  <th class="wd-15p">Status</th>
                </tr>
              </thead>
              <tbody>
              	
              	@php
                   $i = 1;
              	@endphp

              	@foreach($order as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{$item->invoice_no}}</td>
                  <td>{{$item->payment_type}}</td>
                  <td>{{$item->subtotal}}</td>
                  <td>{{$item->coupon_discount}}</td>
                  <td>{{$item->total}}</td>
                  <td>{{$item->created_at}}</td>
                  <td><a href="{{url('admin/order/view/'.$item->id)}}" class="btn-sm btn-info">View</a></td>
                  <td>
                  	@if($item->status == 1)
                  	<a href="{{url('admin/order/done/'.$item->id)}}" class="btn-sm btn-info">Done</a>
                  	@else
                  	<a href="{{url('admin/order/pending/'.$item->id)}}" class="btn-sm btn-warning">Pending</a>
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

        
</div>
</div>

@endsection
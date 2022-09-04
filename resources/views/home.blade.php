@extends('user.frontend-master')
@section('frontend-content')
@section('hero')
hero-normal
@endsection




<table class="table">
  <thead>

    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Invoice No</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Discount</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Total</th>   
      <th scope="col">View</th>  
    </tr>

  </thead>

  <tbody>
    
    @php
        $i = 1;
    @endphp

    @foreach($order as $item)
    <tr>
      <td scope="row">{{ $i++ }}</td>
      <td>{{$item->invoice_no}}</td>
      <td>{{$item->payment_type}}</td>
      <td>{{$item->coupon_discount}}</td>
      <td>{{$item->subtotal}}</td>
      <td>{{$item->total}}</td>
      <td><a href="{{url('order/view/'.$item->id)}}" class="btn-sm btn-info">View</a></td>
    </tr>
    @endforeach

  </tbody>
</table>


@endsection

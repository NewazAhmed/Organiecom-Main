@extends('admin.backend-master')
@section('contact') active @endsection
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
                <div class="card-header">Message Detail
                </div>

                <div class="card-body">
                    <p><b>Name: </b>{{$contact->name}}</p>
                    <p><b>Email: </b>{{$contact->email}}</p>
                    <p><b>Message: </b>{{$contact->message}}</p>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
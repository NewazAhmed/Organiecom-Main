@extends('admin.backend-master')
@section('info') active @endsection
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
                <div class="card-header">Edit & Update Info
                </div>

                <div class="card-body">

                    <form action="{{route('info.update')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$info->id}}" name="info_id">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->phone}}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">

                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                          @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->facebook}}" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook">

                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->facebook}}" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook">

                          @error('facebook')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->linkedin}}" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook">

                          @error('linkedin')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->twitter}}" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter facebook">

                          @error('twitter')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Edit Info</label>
                          <input type="text" value="{{$info->address}}" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter faddress">

                          @error('twitter')
                          <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-info">Update Info</button>
                    </form>
                </div>
            </div>
        </div>

</div>
</div>

@endsection
@extends('admin.backend-master')
@section('banner') active show-sub @endsection
@section('manage-banner') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Edit Banner</span>
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

             <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Banner</h6>
          
    <form action="{{route('banner.data.update')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="banner_id" value="{{$banner->id}}">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title" value="{{$banner->title}}" placeholder="Title">
                   
                  @error('title')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Subtitle: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subtitle" value="{{$banner->subtitle}}" placeholder="Subtitle">
                   
                  @error('subtitle')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
             
            
            <div class="form-layout-footer">
                      <button type="submit" class="btn btn-info mg-l-15">Update Data</button>
                     
                    </div><!-- form-layout-footer -->
                  </div><!-- form-layout -->
            </form>
            
            <form action="{{route('banner.image.update')}}" method="POST" enctype="multipart/form-data">
             @csrf
            
            <input type="hidden" name="id" value="{{ $banner->id }}">
            <input type="hidden" name="img_one" value="{{ $banner->image_one }}">
           
             
             <div class="row">
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbail: <span class="tx-danger">*</span></label><br>
                  <img class="img-thumbnail mb-3" height="220px" width="220px" src="{{asset($banner->image_one)}}" alt="">
                  <input class="form-control" type="file" name="image_one">

                  @error('image_one')
                     <span class="text-danger">{{$message}}</span>
                  @enderror

                </div>
              </div><!-- col-4 -->


            </div>


            

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Update Banner</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
    </form>
        </div><!-- card -->
           </div>
    </div>
</div>

@endsection
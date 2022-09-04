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
          <h6 class="card-body-title">Edit Advertise</h6>
          
   

              

             
            
            <form action="{{route('advertise.image.update')}}" method="POST" enctype="multipart/form-data">
             @csrf
            
            <input type="hidden" name="id" value="{{ $advertise->id }}">
            <input type="hidden" name="img_one" value="{{ $advertise->image_one }}">
           
             
             <div class="row">
              
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbail: <span class="tx-danger">*</span></label><br>
                  <img class="img-thumbnail mb-3" height="220px" width="220px" src="{{asset($advertise->image_one)}}" alt="">
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
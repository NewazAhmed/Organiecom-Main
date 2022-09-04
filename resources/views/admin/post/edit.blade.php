@extends('admin.backend-master')
@section('post') active show-sub @endsection
@section('manage-post') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Edit Post</span>
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
          <h6 class="card-body-title">Edit Post</h6>
          
    <form action="{{route('post.data.update')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="post_id" value="{{$post->id}}">
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_name" value="{{$post->post_name}}" placeholder="Post Name">
                   
                  @error('post_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Author Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="author_name" value="{{$post->author_name}}" placeholder="Author Name">
                   
                  @error('author_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
             
            
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                  <select name="blog_id" class="form-control select2" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                     
                    @foreach ($blog as $item)
                    <option value="{{$item->id}}" {{$item->id == $post->blog_id ? "selected":""}}>{{$item->blog_category}}</option>         
                    @endforeach
                  </select>
                  
                  @error('blog_id')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->

             

             <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Description: <span class="tx-danger">*</span></label>
                  <textarea name="post_description" id="summernote">{{$post->post_description}}</textarea>
                  
                  @error('post_description')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                
                </div>
              </div><!-- col-12 -->

             
            
            <div class="form-layout-footer">
                      <button type="submit" class="btn btn-info mg-l-15">Update Data</button>
                     
                    </div><!-- form-layout-footer -->
                  </div><!-- form-layout -->
            </form>
            
            <form action="{{route('post.image.update')}}" method="POST" enctype="multipart/form-data">
             @csrf
            
            <input type="hidden" name="id" value="{{ $post->id }}">
            <input type="hidden" name="post_img" value="{{ $post-> post_image }}">
            <input type="hidden" name="author_img" value="{{ $post-> author_image }}">
           
             
             <div class="row">
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbail: <span class="tx-danger">*</span></label><br>
                  <img class="img-thumbnail mb-3" height="220px" width="220px" src="{{asset($post->post_image)}}" alt="">
                  <input class="form-control" type="file" name="post_image">

                  @error('post_image')
                     <span class="text-danger">{{$message}}</span>
                  @enderror

                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Author Image: <span class="tx-danger">*</span></label><br>
                  <img class="img-thumbnail mb-3" height="220px" width="220px" src="{{asset($post->author_image)}}" alt="">
                  <input class="form-control" type="file" name="author_image">

                   @error('author_image')
                     <span class="text-danger">{{$message}}</span>
                   @enderror

                </div>
              </div><!-- col-4 -->


             


            </div>


            

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Update Product</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
    </form>
        </div><!-- card -->
           </div>
    </div>
</div>

@endsection
@extends('admin.backend-master')
@section('post') active show-sub @endsection
@section('add-post') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Add Post</span>
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
          <h6 class="card-body-title">Add Post</h6>
          
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_name" value="{{old('post_name')}}" placeholder="Post Name">
                   
                  @error('post_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Post Description: <span class="tx-danger">*</span></label>
                  <textarea name="post_description" id="summernote2"></textarea>
                  
                  @error('post_description')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-12 -->

              </div><!-- col-4 -->
              
              
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                  <select name="blog_id" class="form-control select2" data-placeholder="Choose Blog Category">
                    <option label="Choose Blog Category"></option>
                     
                    @foreach ($blog as $item)
                    <option value="{{$item->id}}">{{$item->blog_category}}</option>         
                    @endforeach
                  </select>
                  
                  @error('blog_id')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->


             <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="post_image">

                   @error('post_image')
                     <span class="text-danger">{{$message}}</span>
                   @enderror

                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Author Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="author_name" value="{{old('author_name')}}" placeholder="Author Name">
                   
                  @error('author_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Author Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="author_image">

                   @error('author_image')
                     <span class="text-danger">{{$message}}</span>
                   @enderror

                </div>
              </div><!-- col-4 -->
              

             

              
              



            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
             
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
    </form>
        </div><!-- card -->
           </div>
    </div>
</div>

@endsection
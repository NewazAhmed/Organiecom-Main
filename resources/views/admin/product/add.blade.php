@extends('admin.backend-master')
@section('product') active show-sub @endsection
@section('add-product') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Add Product</span>
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
          <h6 class="card-body-title">Add Product</h6>
          
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
          <div class="form-layout">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{old('product_name')}}" placeholder="Product Name">
                   
                  @error('product_name')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="Product Code">
                  
                  @error('product_code')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{old('price')}}" placeholder="Product Price">
                   
                  @error('price')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{old('product_quantity')}}" placeholder="Product Quantity">
                   
                  @error('product_quantity')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select name="category_id" class="form-control select2" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                     
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->category_name}}</option>         
                    @endforeach
                  </select>
                  
                  @error('category_id')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                    <option label="Choose Brand"></option>
                    @foreach ($brand as $item)
                    <option value="{{$item->id}}">{{$item->brand_name}}</option>             
                    @endforeach
                  </select>
                   
                  @error('brand_id')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
              
                </div>
              </div><!-- col-4 -->

             <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote"></textarea>
                  
                  @error('short_description')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                
                </div>
              </div><!-- col-12 -->

              <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2"></textarea>
                  
                  @error('long_description')
                     <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
              </div><!-- col-12 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main Thumbail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">

                  @error('image_one')
                     <span class="text-danger">{{$message}}</span>
                  @enderror

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two">

                   @error('image_two')
                     <span class="text-danger">{{$message}}</span>
                   @enderror

                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Second Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three">

                   @error('image_three')
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
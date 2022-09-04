@extends('admin.backend-master')
@section('advertise') active show-sub @endsection
@section('manage-advertise') active @endsection
@section('backend-content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Food Ecommerce</a>
        <span class="breadcrumb-item active">Advertise/Manage Advertise</span>
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
                <div class="card-header">Advertise List</div>


        <div class="card pd-20 pd-sm-40">
         
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-5p">Serial No</th>
                  <th class="wd-10p">Image</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-10p">Action</th>
                </tr>
              </thead>
              <tbody>
                
                @php
                   $i = 1;
                @endphp

                @foreach($advertise as $item)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td> <img src="{{asset($item->image_one)}}" height="50px" width="50px" alt=""></td>

                  <td>
                    @if($item->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                  
                  <td>
                    <a href="{{url('admin/advertise/edit/'.$item->id)}}" class="btn-sm btn-success">E</a>
                    <a href="{{url('admin/advertise/delete/'.$item->id)}}" class="btn-sm btn-danger">D</a>
                    @if($item->status == 1)
                    <a href="{{url('admin/advertise/inactive/'.$item->id)}}" class="btn-sm btn-info">I</a>
                    @else
                    <a href="{{url('admin/advertise/active/'.$item->id)}}" class="btn-sm btn-warning">A</a>
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
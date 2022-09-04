@extends('user.frontend-master')
@section('frontend-content')
@section('hero')
hero-normal
@endsection

<div class="mb-5 container bootstrap snippets bootdey">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="mb-2 col-md-12 col-sm-12 text-left">
          <h4 class="mb-2"><strong>Client</strong> Details</h4>
          
            <p><strong>First Name:</strong> {{$shipping->ship_first_name}}
            <strong> Last Name:</strong> {{$shipping->ship_last_name}} <br>
            <strong> Address:</strong> {{$shipping->ship_address}}
            <strong> State:</strong> {{$shipping->ship_state}}
            <strong> Post Code:</strong> {{$shipping->post_code}} <br>
            <strong> Phone:</strong> {{$shipping->ship_phone}}
            <strong> Email:</strong> {{$shipping->ship_email}}</p>
          
        </div>


       <!-- <div class="col-md-6 col-sm-6 text-right">
          <h4><strong>Client </strong>Contact Details</h4>
          <ul class="list-unstyled">
            
          </ul>
        </div> -->

      </div>

      <div class="table-responsive">
        <table class="table table-condensed nomargin">
          <thead>
            
            <tr>
              <th>Item Name</th>
              <th>Image</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>

          </thead>

          <tbody>
            @foreach($order_item as $item)
            <tr>
              <td>{{$item->product->product_name}}</td>
              <td><img src="{{asset($item->product->image_one)}}" height="80px" width="80px" alt=""></td>
              <td>{{$item->product_qty}}</td>
              <td>{{$item->product->price}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <hr class="nomargin-top">
      <div class="row">
        <div class="col-sm-6 text-left">
          <h4><strong>Contact</strong> Details</h4>
          <br><!-- no P margin for printing - use <br> instead -->

          <address>
            Organi <br>
            Dhaka, Bangladesh<br>
            Phone: 1-800-565-2390 <br>
            Fax: 1-800-565-2390 <br>
            Email:support@yourname.com
          </address>
        </div>

        <div class="col-sm-6 text-right">
          <ul class="list-unstyled">
            <li><strong>Sub - Total Amount:</strong> {{$order->subtotal}}</li>
            <li><strong>Discount:</strong> {{$order->coupon_discount}}</li>
            <li><strong>Grand Total:</strong> {{$order->total}}</li>
          </ul>     
        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default text-right">
    <div class="panel-body">
      <a class="btn btn-success" href="#" target="_blank"><i class="fa fa-print"></i> PRINT INVOICE</a>
    </div>
  </div>
</div>

<style type="text/css" media="screen">
  body{margin-top:20px;
background:#eee;
}

/**    17. Panel
 *************************************************** **/
/* pannel */
.panel {
  position:relative;

  background:transparent;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
      border-radius: 0;

  -webkit-box-shadow: none;
     -moz-box-shadow: none;
      box-shadow: none;
}
.panel.fullscreen .accordion .panel-body,
.panel.fullscreen .panel-group .panel-body {
  position:relative !important;
  top:auto !important;
  left:auto !important;
  right:auto !important;
  bottom:auto !important;
}
  
.panel.fullscreen .panel-footer {
  position:absolute;
  bottom:0;
  left:0;
  right:0;
}


.panel>.panel-heading {
  text-transform: uppercase;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
      border-radius: 0;
}
.panel>.panel-heading small {
  text-transform:none;
}
.panel>.panel-heading strong {
  font-family:Arial,Helvetica,Sans-Serif;
}
.panel>.panel-heading .buttons {
  display:inline-block;
  margin-top:-3px;
  margin-right:-8px;
}
.panel-default>.panel-heading {
  padding: 15px 15px;
  background:#fff;
}
.panel-default>.panel-heading small {
  color:#9E9E9E;
  font-size:12px;
  font-weight:300;
}
.panel-clean {
  border: 1px solid #ddd;
  border-bottom: 3px solid #ddd;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
      border-radius: 0;
}
.panel-clean>.panel-heading {
  padding: 11px 15px;
  background:#fff !important;
  color:#000; 
  border-bottom: #eee 1px solid;
}
.panel>.panel-heading .btn {
  margin-bottom: 0 !important;
}

.panel>.panel-heading .progress {
  background-color:#ddd;
}

.panel>.panel-heading .pagination {
  margin:-5px;
}

.panel-default {
  border:0;
}

.panel-light {
  border:rgba(0,0,0,0.1) 1px solid;
}
.panel-light>.panel-heading {
  padding: 11px 15px;
  background:transaprent;
  border-bottom:rgba(0,0,0,0.1) 1px solid;
}

.panel-heading a.opt>.fa {
    display: inline-block;
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    margin-right: 2px;
    padding: 5px;
    position: relative;
    text-align: right;
    top: -1px;
}

.panel-heading>label>.form-control {
  display:inline-block;
  margin-top:-8px;
  margin-right:0;
  height:30px;
  padding:0 15px;
}
.panel-heading ul.options>li>a {
  color:#999;
}
.panel-heading ul.options>li>a:hover {
  color:#333;
}
.panel-title a {
  text-decoration:none;
  display:block;
  color:#333;
}

.panel-body {
  background-color:#fff;
  padding: 15px;

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
      border-radius: 0;
}
.panel-body.panel-row {
  padding:8px;
}

.panel-footer {
  font-size:12px;
  border-top:rgba(0,0,0,0.02) 1px solid;
  background-color:rgba(0255,255,255,1);

  -webkit-border-radius: 0;
     -moz-border-radius: 0;
      border-radius: 0;
}
</style>

@endsection
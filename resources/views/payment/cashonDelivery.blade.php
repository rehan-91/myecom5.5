@extends('layouts.includes.main')
@section('title','Cash On Delivery ')
@section('content')

<div class="container"> 
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Payment Method</a></li>
  <li class="breadcrumb-item active">Shipping Address</li>
</ol>
<div class="row">
<div class="col-md-8 ">
  <div class="panel panel-default">
    <div class="panel-heading"><b>Shipping Address Details:</b></div>
      <div class="panel-body" style="background:rgb(217, 237, 247)">
 
  <form action="{{route('bankTransferSubmitOrder')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="full_name">Full Name</label>
      <input type="text" name="full_name" class="form-control" value="{{ Auth::user()->name }}" placeholder="Full Name..">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea type="text" name="address" class="form-control" placeholder="Address.."></textarea>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" name="city" class="form-control" placeholder="City..">
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" placeholder="Phone..">
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="text" name="zip" class="form-control" placeholder="Zip Code..">
    </div>
      <button type="submit" class="btn btn-success btn-block">Submit</button>
   </form>
  </div> <!-- panel body -->
 
       <div class="panel-footer">
          <div class="row">
            <div class="panel-footer">
           </div>
            <div class="col-md-7">
              <a href="{{route('paymentMethod')}}" class="btn btn-success" style="background-color: #303734; border: none"><< Back To Payment Options</a>
                </div>
                <div class="col-md-5">
                </div>
               </div>
            </div> <!-- panel footer -->     
          </div>
      </div> <!-- col md 8 -->

         <div class="col-md-4">
        <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><div class="text-center">Info!</div></div>
           <div class="panel-body">
              <div class="alert alert-warning" style=" margin-bottom: 0px;">
               <div class="row">
                 <div class="col-md-5">
                     <b>
                      Items: {{Cart::count()}} <br>
                      Tax:₹ {{Cart::tax()}}<br> 
                      </b>
                </div>
                  <div class="col-md-7">
                      <b>
                        Sub Total:₹ {{Cart::subtotal()}}<br>
                        Grand Total:₹ {{Cart::total()}}</b>
                  </div>
               </div>
            </div>
        </div>
      </div>
     </div>
      
        </div> <!-- col md 4 -->
      </div>
    </div> <!-- container -->

@endsection
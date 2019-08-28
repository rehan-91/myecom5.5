@extends('layouts.includes.main')
@section('title','Cart')
@section('content')

<div class="container"> 
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Library</a></li>
  <li class="breadcrumb-item active">Data</li>
</ol>
<div class="row">
<div class="col-md-8 ">
  <div class="panel panel-default">
    <div class="panel-heading">Edit Cart</div>
      <div class="panel-body">
<br>
            @if($cartItems->isEmpty())
        <div class="text-center" style="color:#a3a0a9;">Cart is Empty.</div>
        @else
        @foreach($cartItems as $cart)
    <div class="row">
     <div class="col-md-5">
        <div class="thumnail-image">
          <img src="http://localhost:8000/images/{{$cart->options->has('image')?$cart->options->image:''}}" alt="" />
           </div>
        </div>
    <div class="col-md-7">    
        <div class="title-product"> <h4 style="margin-top: 0;"><b>{{$cart->name}}</b></h4></div>
           <form action="{{route('updateCart', $cart->rowId)}}" method="post">
                {{ csrf_field() }}
                 {{ method_field('PUT') }}
               <input name="image" type="hidden" value="{{$cart->options->has('image')?$cart->options->image:''}}">
                  <div class="price"> <p> {{$cart->price}}</p></div>
    <div class="row">
        <div class="col-xs-2">
            <label>QTY :</label>
        </div>
        <div class="col-md-8">
             <select  type="text" name="qty" class="form-control" >
                    <option value="{{$cart->qty}}" class="disable selected">{{$cart->qty}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
              </select>
        </div>
    </div>
    <br>
    <div class="row"> 
        <div class="col-md-2">
            <label>SIZE :</label>
        </div>
          <div class="col-md-8">
              <select name="size" class="form-control" >
                    <option value="{{$cart->options->has('size')?$cart->options->size:''}}" >{{$cart->options->has('size')?$cart->options->size:''}}</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
              </select>
        </div>
    </div>
    <br>
    <div class="row">
       <div class="col-md-4"></div>
         <div class="col-md-3">
            <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-check"></i></button>
         </div>
       </form> 
        <div class="col-md-3"> 
            <form action="{{route('deleteItems', $cart->rowId)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                 <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash-o"></i></button>
            </form>

         </div>
        </div>
      </div>
     </div> <!-- row foreach -->
<hr>
@endforeach
@endif
  </div> <!-- panel body -->
  @if($cartItems->isEmpty())
       @else
       <div class="panel-footer">
          <div class="row">
            <div class="panel-footer">
           </div>
         <div class="col-md-7">
             <a href="{{route('allproducts')}}" class="btn btn-success" style="background-color: #303734; border: none">Continue Shopping</a>
              <a href="{{route('paymentMethod')}}" class="btn btn-success" style="background-color: #303734; border: none">Buy Now</a>
          </div>
                     
          <div class="col-md-5">
             <div class="row">
                 <div class="col-md-5">
                     <b>
                      Items:{{Cart::count()}} <br>
                      Taxes:₹ {{Cart::tax()}} <br> 
                      </b>
                </div>
                  <div class="col-md-7">
                      <b>
                       Subtotal:₹ {{Cart::subtotal()}} <br>
                        Grand Total:₹ {{Cart::total()}}</b>
                  </div>
            </div>
          </div>
         </div>
      </div> <!-- panel footer -->   
      @endif    
    </div>
</div> <!-- col md 8 -->

         <div class="col-md-4">
           @include('layouts.includes.sidebar_right')
        </div> <!-- col md 4 -->

    </div>
</div> <!-- container -->

@endsection
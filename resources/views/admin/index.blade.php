@extends('admin.includes.main_admin')
@section('title','Admin Dashboard')
@section('content')

<div class="container">
    <div class="row">
        @include('admin.includes.sidebar_admin')
         <div class="col-md-9">
              <div class="panel panel-primary">
      <div class="panel-heading">Welcome,</div>
      <div class="panel-body">
        <div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body"><a href="{{route('allOrders')}}">Orders <span class="badge">{{$orders->count()}}</span></a> </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body"><a href="{{route('product.index')}}">Products <span class="badge">{{$products->count()}}</span></a> </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body"><a href="{{route('category.index')}}">Categories <span class="badge">{{$categories->count()}}</span></a> </div>
        </div>
    </div>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>

@endsection
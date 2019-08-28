@extends('layouts.includes.main')
@section('title','All Products')

@section('content')
 
 
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>


          <div class="row">
            <div class="col-xs-6 col-sm-3">
              <div class="nice-select">
              <span class="current">Shop Categories</span>
              <ul class="list">
                  <li class="option selected">Some option</li>
                  <li class="option">Another option</li>
                  <li class="option">Potato</li>
              </ul>
            </div>
            </div>
            <div class="col-xs-6 col-sm-3">
            <select id="selectbox2">
                <option value="">Price</option>
                <option value="aye">Aye</option>
                <option value="eh">Eh</option>
                <option value="ooh">Ooh</option>
                <option value="whoop">Whoop</option>
            </select>
            </div>
      
        <div class="col-sm-6 hidden-xs">
          <div class="row">

            <div class="col-sm-4 pull-right">
              <select id="selectbox3">
                  <option value="">Sort By</option>
                  <option value="aye">Aye</option>
                  <option value="eh">Eh</option>
                  <option value="ooh">Ooh</option>
                  <option value="whoop">Whoop</option>
              </select>
            </div>
          </div>  
        </div>
        </div>
        <div class="row">

            @foreach ($products as $product)
           <div class="col-md-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body">
                    <div class="thumnail-image" style="width: 100%;">
                     <img src="{{asset('/images/'.$product->image)}}" alt="" style="width:250px;height:250px;" />
                    </div>
                    <div class="info-product">
                    <button  data-toggle="modal" data-target="#{{$product->id}}-product_detail_modal">Product Info <i class="fa fa-info-circle"></i></button>
                    </div>
                    <div class="title-product"> <h4>{{$product->title}}</h4></div>
                    <div class="size"> 
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    </div>
                    <div class="price">  <p>Price:{{$product->price}}</p></div>
                    <div class="addToCart">
                     <i class="fa fa-heart-o"></i>
                     <i class="fa fa-share"></i>
                     <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary pull-right btn-sm">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


 <!-- Modal -->
<div id="{{$product->id}}-product_detail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>{{$product->title}}</b></h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">  
                <div class="panel-group" style="margin-bottom: 0;">
                <div class="panel panel-default">
                <div class="panel-body">
                 <div class="thumnail-image">
                <img src="{{asset('/images/'.$product->image)}}" alt="" style="width:250px;height:250px;"/>
                </div>
                <div class="title-product"> <h4>{{$product->title}}</h4></div>  
                <div class="size"> 
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span></div>
                <div class="price">  <p>Price:{{$product->price}}</p></div>
                <div class="addToCart">
                     <i class="fa fa-heart-o"></i>
                     <i class="fa fa-share"></i>
                     <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary pull-right btn-sm">Add to Cart</a>
                </div>
                </div>
              </div>
             </div>
            </div>
            <div class="col-md-4">
               <div class="category-product">
                    <i class="fa fa-list"></i> <b>Category: </b>
                    <p>{{$product->category->name}}</p>
               </div>
                 <div class="category-product">
                    <i class="fa fa-th-large"></i> <b>Size: </b>
                    <p>S, M, L, XL</p>
               </div>
              
               <div class="description-product">
               <i class="fa fa-info-circle"></i> <b>Description:</b>
               <p>{{$product->description}}</p>
            
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @endforeach
</div>
        <div class="show_more">
            <a href="#" class="btn btn-default">Show more >>></a>
        </div>
        <div class="container text-center">
            {!!$products->Links()!!}
        </div>
        </div><br>
        <div class="container-fluid">
          <div class="jumbotron jumbotron-bg" style="background-color: #099; color: #fff;">
            <h1>Hot!</h1> 
            <button class="btn btn-success">Promo</button>
          </div>
         </div> 

@endsection


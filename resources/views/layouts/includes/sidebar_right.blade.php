    <div class="panel-group">
      <div class="panel panel-default">
  			<div class="panel-heading">Sidebar</div>
         </div>
          </div>

     <div class="panel-group">
        <div class="panel panel-default">
  			   <div class="panel-body">
 	            <div class="alert alert-info" style=" margin-bottom: 0px;">
 	              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s 
              </div>
  			</div>
      </div>
     </div>

     <!-- foreach -->
     @foreach($products as $product)
      <div class="panel-group">
        <div class="panel panel-default">
         <div class="panel-body"> 
            <div class="thumnail-image">
              <img src="{{asset('/images/'.$product->image)}}" alt="" />
         </div>
      <div class="info-product">
          <button  data-toggle="modal" data-target="#">Info Product <i class="fa fa-info-circle"></i></button>
      </div>
          <div class="title-product"> <h4>{{$product->title}}</h4></div>
         
            <div class="size"> 
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
              </div>
              <div class="price">  <p>{{$product->price}}</p></div>
              <div class="addToCart">
                  <i class="fa fa-heart-o"></i>
                  <i class="fa fa-share"></i>
                  <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary pull-right btn-sm">Add to Cart</a>
              </div>
             </div>
          </div>
      </div>
        <!-- 3ndforeach -->
        @endforeach
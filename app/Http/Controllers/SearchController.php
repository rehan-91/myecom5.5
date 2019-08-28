<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;

class SearchController extends Controller
{
    public function search(Request $request)

    {	
    	$cartItems = Cart::content();
    	$categories =Category::all();
    	$searchData = $request->input('search');
    	$products = Product::join('categories','categories.id','products.category_id')->where('title','LIKE','%' .$searchData. '%')->get();
    	return view('search.searchresult',['products' => $products],compact('categories','cartItems'));
    }
}

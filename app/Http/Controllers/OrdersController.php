<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{
    public function allOrders()
    {
    	$allOrders = Order::all(); 
    	return view('admin.order.allOrders', compact('allOrders'));
    }



    public function OrderStatus(Request $request,$id)
    {

    	$status = Order::find($id);
    	$status->status = $request->status;
    	$status->save();
   		return back();
    }



    public function pendingOrders()
    {
    	$pendingOrders = Order::where('status','0')->get(); 
    	return view('admin.order.pendingOrders', compact('pendingOrders'));
    	return back();
    }

    public function deliveredOrders()
    {
    	$deliveredOrders  = Order::where('status','1')->get(); 
    	return view('admin.order.deliveredOrders', compact('deliveredOrders'));
    	return back();
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Shipping;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orderIndex(){
        $orders = Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }

    //view orders //
    public function viewOrder($order_id){
        $order = Order::findOrFail($order_id);
        $orderItems = OrderItem::where('order_id',$order_id)->get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        return view('admin.order.view',compact('order','orderItems','shipping'));
    }

    // status Processing
    public function orderInactive($order_id){
        Order::findOrFail($order_id)->update(['delivery_status' => 1]);
        return Redirect()->back()->with('delivery_status','Delivery Status Processing');
    }


    // status Delivered
    public function orderActive($order_id){
        Order::findOrFail($order_id)->update(['delivery_status' => 0]);
        return Redirect()->back()->with('delivery_status','Delivery Status Delivered');
    }

}

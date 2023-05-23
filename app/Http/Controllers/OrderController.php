<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $userEmail = Auth::user()->email;
        $orders = Order::where('email', $userEmail)->get();
        return view('/cart')->with('orders', $orders);
    }

    public function delete($orderId){
        Order::where('id', $orderId)->delete();
        return redirect()->back();
    }

    public function deleteAll(){
        Order::truncate();
        return redirect()->back()->with('success', 'All orders deleted successfully.');
    }


    public function store(Request $request)
    {
        $userName = $request->input('user_name');
        $email = $request->input('email');
        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $productImage = $request->input('product_image');

        $order = new Order();
        $order->user_name = $userName;
        $order->email = $email;
        $order->product_name = $productName;
        $order->product_price = $productPrice;
        $order->product_image = $productImage;

        $order->save();

        return redirect()->back()->with('success', 'Order placed successfully.');
    }





}

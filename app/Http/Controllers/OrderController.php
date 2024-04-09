<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $viewData = [];
        $viewData["title"] = "Products  - CSIS 3560 Online Store Demo";
        $viewData["subtitle"] =  "Order";
        $viewData["userId"] = $userId;
        $viewData["orders"] = Order::with('user')->where('customerID', $userId)->orderBy('created_at', 'desc')->get();
        return view('order.index')->with("viewData", $viewData);
    }


    public function store(Request $request)
    {
        $userId = Auth::id();

        DB::transaction(function () use ($userId) {
            // add order
            $order = new Order();
            $order->setCustomerID($userId);
            $order->save();

            // get cart
            $cartItems = Cart::where('customerID', $userId)->get();
            foreach ($cartItems as $cartItem) {
                // add order detail
                $orderDetail = new OrderDetail();
                $orderDetail->setOrderID($order->id);
                $orderDetail->setProductID($cartItem->productID);
                $orderDetail->setQuantity($cartItem->quantity);
                $orderDetail->save();
            }

            // clear cart
            Cart::where('customerID', $userId)->delete();
        });

        $viewData["title"] = "Sandwich Queen";
        $viewData["subtitle"] = "Queen of Sandwiches, Ruler of Flavors";
        return redirect()->route('order.index');
    }

    public function detail($id)
    {
        $userId = Auth::id();

        $order = Order::with(['orderDetails.product'])
            ->where('id', $id)
            ->where('customerID', $userId)
            ->firstOrFail();

        $viewData = [];
        $viewData["title"] = "Products - CSIS 3560 Online Store Demo";
        $viewData["subtitle"] = "Order Detail";
        $viewData["userId"] = $userId;
        $viewData["order"] = $order;

        $totalAmount = 0;
        foreach ($order->orderDetails as $detail) {
            $totalAmount += $detail->quantity * $detail->product->price;
        }
        $viewData["totalAmount"] = $totalAmount;

        return view('order.detail')->with("viewData", $viewData);
    }
}

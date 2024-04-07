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
        return view('home.index')->with("viewData", $viewData);    }

}

?>
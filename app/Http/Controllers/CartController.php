<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $viewData = [];
        $viewData["title"] = "Products  - CSIS 3560 Online Store Demo";
        $viewData["subtitle"] =  "Cart";
        $viewData["userId"] = $userId;
        $viewData["carts"] = Cart::with(['product', 'user'])->where('customerID', $userId)->get();
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request)
    {

        $userId = Auth::id();


        // Cart::validate($request);

        // dd('123123123');

        // check same product
        $cartItem = Cart::where('customerID', $userId)
            ->where('productID', $request->input('productID'))
            ->first();



        if ($cartItem) {
            // add quantity
            $cartItem->quantity += $request->input('quantity');
            $cartItem->save();
        } else {
            // add
            $newCart = new Cart();
            $newCart->setProductID($request->input('productID'));
            $newCart->setCustomerID($userId);
            $newCart->setQuantity($request->input('quantity'));
            $newCart->save();
        }

        return redirect('/products')->with('success', 'Product added to cart');
    }

    public function delete($id)
    {
        Cart::destroy($id);
        return back();
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return back()->with('success', 'Cart updated successfully.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function validate($request)
    {
        $request->validate([
            "orderID" => "required",
            "productID" => "required",
            "quantity" => "required|numeric|gt:0",
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getProductID()
    {
        return $this->attributes['productID'];
    }

    public function setProductID($productID)
    {
        $this->attributes['productID'] = $productID;
    }

    public function getOrderID()
    {
        return $this->attributes['orderID'];
    }

    public function setOrderID($orderID)
    {
        $this->attributes['orderID'] = $orderID;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }
}

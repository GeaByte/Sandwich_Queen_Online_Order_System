<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // use HasFactory;
    public static function validate($request)
    {
        $request->validate([
            "productID" => "required",
            "customerID" => "required",
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

    public function getCustomerID()
    {
        return $this->attributes['customerID'];
    }

    public function setCustomerID($customerID)
    {
        $this->attributes['customerID'] = $customerID;
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

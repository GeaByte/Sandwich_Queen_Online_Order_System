<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public static function validate($request)
    {
        $request->validate([
            "custonerID" => "required",
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

    public function getCustomerID()
    {
        return $this->attributes['customerID'];
    }

    public function setCustomerID($customerID)
    {
        $this->attributes['customerID'] = $customerID;
    }
}

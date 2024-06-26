<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderID', 'id');
    }

    public static function validate($request)
    {
        $request->validate([
            "custonerID" => "required",
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customerID');
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

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable =[
        'user_id',
        'payment_id',
        'order_id',
        'status',
        'shipment_date', 
    ];
    public function customer(){
        return $this->belongTo(User::class);
    }
    public function order(){
        return $this->belongTo(Order::class);
   
    }
    public function payment(){
        return $this ->hasOne(Payment::class);
    }
}

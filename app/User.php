<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'email_verified',
        'mobile_verified',
        'shipping_address',
        'billing_address',
        'api_token',
        'cart_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders() {

        return $this->hasMany(Order::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);

    }
    public function shipments(){
        return $this->hasMany(Shipment::class);
    }
    public function shippingAddress(){
        return $this->hasone(Adrress::class,'id','shipping_address');
    }
    public function billingAddress(){
        return $this->hasone(Adrress::class,'id','billing_address');
    }
    public function wishlist(){
        return $this->hasOne(WishList::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function role(){
        return $this->belongsToMany(Role::class);
    }
    public function formattedName(){
        return $this->first_name .''. $this->last_name;
    }
      public function cart(){
        return $this->hasone(Cart::class,'id','cart_id');
    }


}

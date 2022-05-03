<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'email'     =>$this->email,
            'email_confirmed'=>$this->email_verified,
            'mobile'=>$this->mobil,
            'mobile_confirmed'=>$this->mobile_verified,
            'shipping_address'=> new AdressResource($this->shipping_addrress),
            'billing_address'=>  new AdressResource($this->billing_addrress),
            'member_since'=>$this->created_at->format('l jS \\of F Y'),
            
            

        ];
    }
}

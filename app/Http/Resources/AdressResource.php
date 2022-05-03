<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdressResource extends JsonResource
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
            'address_id'=>$this->id,
            'streat_number'=>$this->streat_number,
            'streat_name'=>$this->streat_name,
            'city'=>$this->city,
            'state'=>$this->state,
            'country'=>$this->country,
            'post_code'=>$this->post_code,


        ];
    }
}

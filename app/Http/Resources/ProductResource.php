<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_id'=>$this->id,
            'product_title'=>$this->title,
            'product_description' => $this->description,
            'product_price'=> number_format($this->price,2),
            'product_unit'=>new UnitResource($this->hasUnit),

            
            'product_total'=>number_format($this->total,2),
            'product_discount'=>number_format($this ->discount,2),
            'product_option'=>$this->options,
            'categories'=> new CategoryResource($this ->category),
            'product_images'=>ImageResource::collection($this->images),
            
            'product_tags'=>TagResource::collection($this->tags),
            'product_review'=>ReviewResource::collection($this->reviews),
            
        
        ];
    }
}

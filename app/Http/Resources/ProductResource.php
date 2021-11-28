<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name'=> $this->name,
            'amount'=> $this->amount,
            'qrcode'=> $this->qrcode,
            'description'=> $this->description,
            'discounte'=> $this->discount,
            'quantity'=> $this->quantity,
            'price'=> $this->price,
            'color'=> $this->color,
            'warranties'=> $this->warranties,
            'manuel'=> $this->manuel,
            'brand_id'=> $this->brand_id,
            'category_id'=> $this->category_id,
            'code' => $this->code,
            'image' => $this->image,
        ];
    }
}

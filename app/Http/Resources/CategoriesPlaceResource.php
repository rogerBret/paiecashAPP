<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesPlaceResource extends JsonResource
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
            'stade_id' => $this->stade_id,
            'place_id' => $this->place_id,
        ];
    }
}

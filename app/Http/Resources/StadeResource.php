<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StadeResource extends JsonResource
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

            'id'=> $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'capacity' => $this->capacity,
        ];
    }
}

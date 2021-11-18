<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'type' => $this->type,
            'price' => $this->price,
            'stade_id' => $this->stade_is,
            'place_id' => $this->place_id,
            'categori_id' => $this->categori_id,
        ];
    }
}

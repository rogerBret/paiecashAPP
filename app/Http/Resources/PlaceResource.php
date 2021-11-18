<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
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
            'rowNumber' => $this->rowNumber,
            'seatNumber' => $this->seatNumber,
            'gateNumber' => $this->gateNumber,
            'section' => $this->section,
            'satde_id' => $this->stade_id,
        ];
    }
}

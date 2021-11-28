<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntrepriseResource extends JsonResource
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

        return[
            'id' => $this->id,
            'raisonSociale' => $this->raisonSociale, 
            'longitude'=> $this->longitude, 
            'latitude'=> $this->latitude, 
            'city' => $this->city, 
            'address1' => $this->address1, 
            'address2'=> $this->address2, 
            'email'=> $this->email, 
            'phone'=> $this->phone, 
            'user_id'=> $this->user_id
        ];
    }
}

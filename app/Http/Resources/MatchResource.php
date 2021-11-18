<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
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
            'type_match' => $this->type_match,
            'equipe' => $this->equipe,
            'date_match' => $this->date_match,
            'heure_match' => $this->heure_match,
        ];
    }
}

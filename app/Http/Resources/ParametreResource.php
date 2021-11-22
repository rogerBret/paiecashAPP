<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParametreResource extends JsonResource
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
            'urlReturn' => $this->urlReturn,
            'acceptePaiement' => $this->acceptePaiement,
            'billing'=> $this->billing,
            'litigeManagement' => $this->litigeManagement,
            'paiementCard' => $this->paiementCard,
            'paiementHistry' => $this->paiementHistry,
            'id_paiement_mode' => $this->id_paiement_mode,
            'id_service' => $this->id_service,
            'id_app' => $this->id_app
        ];
    }
}

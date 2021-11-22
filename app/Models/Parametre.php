<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;

    protected $table = "paramertres";

    protected $fillable = ['urlReturn', 'acceptePaiement', 'billeing', 'litigeManagement', 'paiementCard', 'paiementHistry', 'id_paiement_mode', 'id_app', 'id_service'];

    public function apps(){
        return $this->belongTo(App::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function paiementMode(){

        return $this->hasOne(PaiementMode::class);
    }
}

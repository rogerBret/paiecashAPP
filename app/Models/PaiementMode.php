<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementMode extends Model
{
    use HasFactory;

    protected $table = "paiement_modes";

    protected $fillable = ['singlePaiement', 'paiementGroup'];

    public function parametre(){

        return $this->belongTo(Parametre::class);
    }
    
}

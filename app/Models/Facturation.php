<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;

    protected $table = "facturations";

    protected $fillable = ['type', 'price', 'id_service', 'id_app'];


    public function apps(){
        return $this->belongTo(App::class);
    }

    public function facturations(){
        return $this->belongTo(Facturation::class);
    }
}

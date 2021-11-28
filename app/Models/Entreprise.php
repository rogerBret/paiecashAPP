<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table ='entreprises';

    protected $fillable = [
        'raisonSociale', 
        'longitude', 
        'latitude', 
        'city', 
        'address1', 
        'address2', 
        'email', 
        'phone', 
        'user_id'
    ];
}

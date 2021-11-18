<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stade extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'longitude', 'latitude', 'capacity'];

    public function place(){
        return $this->hasMany(Place::class);
    }

    public function categoriPlace(){
        return $this->hasMany(CategoriPlace::class);
    }
}

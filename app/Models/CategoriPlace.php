<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriPlace extends Model
{
    use HasFactory;

    protected $fillable =['name', 'place_id', 'stade_id'];

    public function stade(){
        return $this->belongTo(Stade::class);
    }

    public function place(){
        return $this->hasMany(Place::class);
    }
}

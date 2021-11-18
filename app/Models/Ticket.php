<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

   protected $fillable = ['type', 'price', 'stade_id', 'match_id', 'place_id', 'category_id'];


   public function stade(){
        return  $this->belongsTo(Sate::class);
   }

   public function place(){
    return  $this->hasOne(Place::class);
   }

   public function match()
   {
       return $this->hasMany(Matches::class);
   }

   public function categoriPlace(){
        return  $this->belongsTo(CategoriPlace::class);
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = ['type_match', 'equipe', 'date_match', 'heure_match'];
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}

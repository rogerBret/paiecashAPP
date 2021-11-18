<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['rowNumber', 'seatNumber', 'section', 'gateNumber','stade_id'];

    public function stade(){
        return $this->belongsTo(Stade::class);
    }

    public function ticket(){
        return  $this->belongsTo(Ticket::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phoneCode',
        'flag',
        'zone_id'
    ];

    public function towns()
    {
        return $this->hasMany(Town::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}

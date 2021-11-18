<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription_type()
    {
        return $this->hasMany(Subscription_type::class);
    }
}

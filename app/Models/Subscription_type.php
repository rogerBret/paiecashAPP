<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'subscription_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

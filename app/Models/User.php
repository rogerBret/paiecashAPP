<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'first_name',
        'role',
        'last_name',
        'phone',
        'email',
        'password',
        'town_id',
        'user_id',
        'structureName',
        'longitude',
        'latitude'
    ];

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function qrcodes()
    {
        return $this->hasMany(Qrcode::class);
    }

    public function useraccounts()
    {
        return $this->hasMany(UserAccount::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }


}

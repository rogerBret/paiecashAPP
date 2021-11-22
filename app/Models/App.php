<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $table = "apps";

    protected $fillable = ['appName', 'userAccount', 'costomersId', 'appSecreteCode', 'user_accounte_id'];

    public function userAccounte(){

        return $this->belongTo(UserAccount::class);
    }

    public function services(){

        return $this->hasMany(Service::class);
    }

    public function facturation(){
        return $this->hasMany(Facturation::class);
    }
}

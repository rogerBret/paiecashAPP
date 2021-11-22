<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table ="services";

    protected $fillable = ['serviceName', 'status', 'tarification', 'price', 'id_app'];

    public function apps(){
        return $this->belongTo(App::class);
    }
}


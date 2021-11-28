<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'qrcode',
         'description',
         'discounte',
        'quantity',
        'price',
        'color',
        'warranties',
        'manuel',
         'brand_id',
         'category_id',
       'code',
        'image',
    ];

    public function brand(){

        return $this->belongsTo(Brande::class);

    }

    public function cateogry(){

        return $this->belongsToMany(Categories::class);
    }
    
}

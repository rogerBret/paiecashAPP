<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;
    protected $table = 'pin';

	protected $casts = [
		'pin' => 'int',
		'confirmed' => 'int'
	];

	protected $fillable = [
        'phone',
		'pin',
		'confirmed'
	];
}

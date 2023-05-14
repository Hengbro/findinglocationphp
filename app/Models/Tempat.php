<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'alamatId',
        'kategoriId',
        'nameTempat',
        'email',
        'phone',
        'kota',
        'imageTempat',
        'openH',
        'closeH',
        'kategori',
        'imagaPemilik',
        'deskription',
        'status',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];

}

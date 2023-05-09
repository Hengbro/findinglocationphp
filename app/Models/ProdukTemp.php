<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTemp extends Model
{
    use HasFactory;
    protected $fillable = [
        'tempatId',
        'name',
        'price',
        'image',
        'description',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tempatId',
        'name',
        'stock',
        'image',
        'categoryId',
        'category',
        'description',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];
}

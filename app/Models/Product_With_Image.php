<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_With_Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'description',
        'amount',
        'price',
    ];
}

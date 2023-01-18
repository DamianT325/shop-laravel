<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_With_Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'description',
        'amount',
        'price',
        'category_id'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function isSelectedCategory(int $category_id): bool
    {
        return !is_null($this->category) && $this->category->id == $category_id;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'sku',
        'name',
        'description',
        'full_description',
        'price',
        'image_url',
        'audio_snippet_url',
        'rating',
    ];

    public function cartItems()
    {
        return $this->hasMany(Item::class, 'product_id', 'product_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
    }
}


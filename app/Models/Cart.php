<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'cart_id', 'cart_id');
    }

    // Helper method to get cart total
    public function getTotal()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->quantity * $item->product->price;
        }

        return $total;
    }
}

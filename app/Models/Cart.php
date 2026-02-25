<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'session_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Total price of all items in this cart.
     */
    public function getTotal(): float
    {
        return $this->items->sum(fn ($item) => $item->quantity * $item->product->price);
    }
}

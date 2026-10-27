<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
    ];

    // Relasi keranjang dengan pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi keranjang dengan item keranjang
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    // Relasi item dengan keranjang
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    // Relasi item dengan produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
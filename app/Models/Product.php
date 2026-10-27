<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'seller_id',
        'name',
        'description',
        'price',
        'stock',
        'category',
        'image',
        'status',
    ];

    // Relasi produk dengan penjual
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Relasi produk dengan detail keranjang
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relasi produk dengan detail pesanan
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi produk dengan ulasan
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
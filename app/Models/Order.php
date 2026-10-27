<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];

    // Relasi pesanan dengan pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi pesanan dengan detail pesanan
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // Relasi pesanan dengan pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }
}
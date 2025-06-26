<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function items()
    {
        // Mendefinisikan bahwa sebuah Order 'memiliki' banyak OrderItem.
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        // Mendefinisikan bahwa sebuah Order 'milik' seorang User.
        return $this->belongsTo(User::class);
    }
}

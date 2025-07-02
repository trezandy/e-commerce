<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    // Tambahkan baris ini untuk keamanan Mass Assignment
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',

    ];
    /**
     * Relasi ke kategori produk
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Mendefinisikan bahwa sebuah varian 'milik' sebuah produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    // Tambahkan baris ini untuk keamanan Mass Assignment
    protected $guarded = [];

    // TAMBAHKAN FUNGSI DI BAWAH INI
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

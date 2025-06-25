<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Kolom ini menghubungkan produk ke kategori.
            // Jika kategori dihapus, semua produk di dalamnya juga akan terhapus.
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // Deskripsi bisa panjang
            $table->bigInteger('price'); // Harga, misal 10 digit total, 2 di belakang koma
            $table->integer('stock'); // Stok produk
            $table->string('image')->nullable(); // Path/URL ke gambar produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

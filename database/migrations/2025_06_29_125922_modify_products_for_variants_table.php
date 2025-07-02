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
        Schema::table('products', function (Blueprint $table) {
            // Tambahkan kolom harga diskon setelah kolom harga
            $table->decimal('sale_price', 10, 2)->nullable()->after('price');

            // Jadikan kolom price dan stock bisa null, karena nilainya sekarang
            // akan lebih sering diambil dari varian.
            $table->decimal('price', 10, 2)->nullable()->change();
            $table->integer('stock')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sale_price');
            $table->decimal('price', 10, 2)->nullable(false)->change();
            $table->integer('stock')->nullable(false)->change();
        });
    }
};

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
        Schema::table('order_items', function (Blueprint $table) {
            // Kolom ini bisa null, untuk kasus produk tanpa varian
            $table->foreignId('product_variant_id')->nullable()->constrained()->nullOnDelete()->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Perintah untuk menghapus foreign key dan kolom
            $table->dropForeign(['product_variant_id']);
            $table->dropColumn('product_variant_id');
        });
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users'); // Jika sudah ada login
            $table->unsignedBigInteger('user_id')->nullable(); // Untuk awal, user bisa tidak login
            $table->decimal('grand_total', 10, 2);
            $table->text('shipping_address');
            $table->string('phone_number');
            $table->string('status')->default('pending'); // pending, processing, shipped, completed, cancelled
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

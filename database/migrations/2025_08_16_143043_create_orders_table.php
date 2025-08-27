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
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('cart_id')->nullable()->constrained('carts')->onDelete('set null');
            $table->enum('status', ['pending', 'preparing', 'delivered', 'canceled'])->default('pending');
            
            // Infos client
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('adresse');
            $table->string('CodePostal');
            
            $table->string('gouvernorat', 50);
            $table->timestamps();

            // Totaux snapshot
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('discount_total', 10, 2)->default(0);
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            
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

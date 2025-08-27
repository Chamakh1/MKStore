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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('session_id')->nullable()->index();
            //status du panier
            // active: panier en cours de modification
            // converted: panier converti en commande
            // abandoned: panier abandonné sans conversion
            $table->enum('status', ['active', 'converted', 'abandoned'])->default('active');
            // total sans livraison et remise
            $table->decimal('subtotal', 10, 2)->default(0);
            // total des remises appliquées
            $table->decimal('discount_total', 10, 2)->default(0);
            //total avec prix de livraison
            $table->decimal('shipping_fee', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

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
        //cart_items est la table pivot qui enregistre chaque produit ajouté dans un panier.
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');

            $table->integer('quantity')->default(1);
            //Prix unitaire du produit au moment de l’ajout dans le panier.
            $table->decimal('unit_price', 10, 2);
            //Total de la ligne (quantity * unit_price)
            $table->decimal('line_total', 10, 2);

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};

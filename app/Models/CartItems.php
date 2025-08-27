<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartItems extends Model
{
       protected $fillable = [
        'cart_id', 'product_id', 'quantity', 
        'unit_price', 'line_total', 'options'
    ];

        // Ligne de panier appartient à un panier
    public function cart()
    {
        return $this->belongsTo(Carts::class);
    }

    // Ligne de panier correspond à un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

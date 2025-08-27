<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
protected $fillable = [
    'order_id', 'product_id', 'product_name', 'quantity', 
    'unit_price', 'line_total', 'options'
];


    // Une ligne de commande appartient à une commande
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    // Une ligne de commande correspond à un produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

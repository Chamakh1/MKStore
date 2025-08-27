<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItems;

class Carts extends Model
{
  
    protected $fillable = [
        'user_id', 'session_id', 'status', 
         'subtotal', 'discount_total', 
        'shipping_fee', 'total', 'expires_at'
    ];
    // Un panier appartient éventuellement à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Un panier contient plusieurs articles
    public function items()
    {
        return $this->hasMany(CartItems::class,'cart_id');
    }

   
}

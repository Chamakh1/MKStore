<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id', 'cart_id', 'status', 'subtotal', 'discount_total', 
        'shipping_fee', 'total', 'name', 'email', 'phone', 
        'adresse', 'CodePostal', 'gouvernorat', 'region', 'postal_code'
    ];


    
    
    // Une commande appartient éventuellement à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Une commande peut provenir d'un panier
    public function cart()
    {
        return $this->belongsTo(Carts::class);
    }

    // Une commande contient plusieurs lignes d'articles
 public function items()
{
    return $this->hasMany(OrderItems::class, 'order_id'); // <-- clé étrangère correcte
}

}

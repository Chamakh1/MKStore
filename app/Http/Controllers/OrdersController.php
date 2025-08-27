<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\OrderItems;

class OrdersController extends Controller
{


public function index(Request $request)
{
    $categories = Category::all();
    
    $cartId = $request->get('cart_id'); 

    $cart = null; // ⚡ important : initialiser

    if ($cartId) {
        $cart = Carts::where('id', $cartId)
            ->with('items.product')
            ->firstOrFail();
    } elseif (Auth::check()) {
        $cart = Carts::where('user_id', Auth::id())
            ->with('items.product')
            ->first();
    }
    else {
        $sessionCart = session()->get('cart', []);
        // transformer le panier invité pour qu'il ressemble à un objet comme pour le panier connecté
        $cart = (object)[
            'items' => $sessionCart
        ];
    }

    return view('guest.checkout', compact('cart','categories')); // ⚡ assure-toi que tu as bien 'checkout'
}



/**
 * Traiter la commande
 */
public function store(Request $request)
{
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',
            'phone'       => ['required','regex:/^[0-9]{8,15}$/'],
            'adresse'     => 'required|string|max:255',
            'CodePostal'  => ['required','regex:/^[0-9]{4,10}$/'],
            'gouvernorat' => 'required|string|in:Ariana,Béja,Ben Arous,Bizerte,Gabès,Gafsa,Jendouba,Kairouan,Kasserine,Kébili,Kef,Mahdia,Manouba,Médenine,Monastir,Nabeul,Sfax,Sidi Bouzid,Siliana,Sousse,Tataouine,Tozeur,Tunis,Zaghouan'],
        );


    $cart = null;

    if (Auth::check()) {
        // Client connecté
        $cart = Carts::where('user_id', Auth::id())->with('items.product')->first();
    } else {
        // Client invité : récupérer depuis la table carts via session_id
        $sessionId = session()->getId();
        //dd($sessionId);
        $cart = Carts::where('session_id', $sessionId)
                     ->where('status', 'active')
                     ->with('items.product')
                     ->first();
    }

    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->back()->with('error', 'Votre panier est vide.');
    }

    // Calcul des totaux
    $subtotal = $cart->items->sum(fn($item) => $item->unit_price * $item->quantity);
    $shipping_fee = 8;
    $total = $subtotal + $shipping_fee;

    // Créer la commande
    $order = Orders::create([
        'user_id'     => Auth::id() ?? null,
        'cart_id'     => $cart->id,
        'status'      => 'pending',
        'name'        => $request->name,
        'email'       => $request->email,
        'phone'       => $request->phone,
        'adresse'     => $request->adresse,
        'CodePostal'  => $request->CodePostal,
        'gouvernorat' => $request->gouvernorat,
        'subtotal'    => $subtotal,
        'shipping_fee'=> $shipping_fee,
        'total'       => $total,
    ]);

    // Copier les items dans order_items
    foreach ($cart->items as $item) {
        OrderItems::create([
            'order_id'     => $order->id,
            'product_id'   => $item->product_id,
            // ⚡ Vérifier si product_name existe sinon utiliser le nom du produit lié
            'product_name' => $item->product_name ?? ($item->product->name ?? 'Produit inconnu'),
            'unit_price'   => $item->unit_price,
            'quantity'     => $item->quantity,
            'line_total'   => $item->unit_price * $item->quantity,
        ]);
    }


    // Vider le panier
    $cart->items()->delete();
    $cart->delete();

    return redirect('/')->with('success', 'Votre commande a été passée avec succès !');
}


   





}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use App\Models\Product;
use App\Models\CartItems;
use App\Models\Category;

class CartsController extends Controller

{




public function AffichePanier()
{
    $categories = Category::all();
    $products = Product::all();
    $user = Auth::user();

    if ($user) {
        // Récupérer le panier actif de l'utilisateur
        $panier = Carts::with('items.product')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();
    } else {
        // Pour les visiteurs non connectés, récupérer via session
        $sessionId = session()->getId();
        $panier = Carts::with('items.product')
            ->where('session_id', $sessionId)
            ->where('status', 'active')
            ->first();
    }

    // Si aucun panier existant, créer un panier vide
    if (!$panier) {
        $panier = new Carts();
        $panier->items = collect(); // collection vide
        $panier->subtotal = 0;
    }

    // Ajouter automatiquement les frais de livraison
    $shippingFee = 8; // 8 dt
    $panier->shipping_fee = $shippingFee;
    $panier->total = ($panier->subtotal ?? 0) + $shippingFee;

    return view('guest.panier', compact('panier', 'categories', 'products'));
}




   
    /**
     * Ajouter un produit au panier
     */
    public function AddProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $carts = $this->getUserCart();
        $product = Product::findOrFail($request->product_id);

        // Charger les items pour éviter les problèmes de relation
        $carts->load('items');

        // Vérifier si le produit est déjà dans le panier
        $item = $carts->items->firstWhere('product_id', $product->id);

        try {
            if ($item) {
                // Mise à jour de la quantité
                $item->quantity += $request->quantity;
                $item->line_total = $item->quantity * $item->unit_price;
                $item->save();
            } else {
                // Création d'une nouvelle ligne
                $carts->items()->create([
                    'product_id'   => $product->id,
                    'product_name' => $product->name,
                    'unit_price'   => $product->price,
                    'quantity'     => $request->quantity,
                    'line_total'   => $product->price * $request->quantity,
                ]);
            }

            // Mettre à jour les totaux en incluant les frais de livraison
            $this->updateCartTotals($carts);
           

            return view('guest.panier');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout du produit au panier. Veuillez réessayer.');
        }
}

        /**
         * Supprimer un produit du panier
         */
        public function RemoveProduct(Request $request, $productId)
        {
            $carts = $this->getUserCart();

            // Charger les items
            $carts->load('items');

            // Trouver l'item correspondant au produit
            $item = $carts->items->firstWhere('product_id', $productId);

            if ($item) {
                $item->delete(); // Supprimer l'item du panier
                $this->updateCartTotals($carts); // Mettre à jour les totaux
                return redirect()->back()->with('success', 'Produit supprimé du panier.');
            }

            return redirect()->back()->with('error', 'Produit non trouvé dans le panier.');
        }





        
    /**
     * Obtenir le panier de l’utilisateur (ou session si non connecté)
     */
    private function getUserCart()
    {
        if (Auth::check()) {
            return Carts::firstOrCreate([
                'user_id' => Auth::id(),
                'status' => 'active',
            ]);
        }

        $sessionId = session()->getId();

        return Carts::firstOrCreate([
            'session_id' => $sessionId,
            'status' => 'active',
        ]);
    }

    /**
     * Mettre à jour les totaux du panier
     */
    private function updateCartTotals(Carts $carts)
    {
        $subtotal = $carts->items()->sum('line_total');

        $carts->subtotal = $subtotal;
        $carts->discount_total = 0;
        $carts->shipping_fee = 8; // frais fixes
        $carts->total = $subtotal + $carts->shipping_fee;
        $carts->save();
    }

}

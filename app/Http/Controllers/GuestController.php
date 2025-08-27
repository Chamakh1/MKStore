<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
            public function home(){
                $categories = Category::all();
                $products   = Product::orderBy('created_at','desc')->paginate(6);
                return view('guest.home', compact('categories', 'products'));
}

            public function detailProduct($id)
            {
                $categories = Category::all();
                $product = Product::find($id);

                // Produit introuvable → retour à la Home
                if (!$product) {
                    return redirect()->route('guest.home')
                                    ->with('error', 'Produit introuvable.');
                }

                $products = Product::where('id', '!=', $id)->get();

                return view('guest.detailProduct', compact('categories', 'product', 'products'));
        }


        public function shop(){
            $categories = Category::all();
            $products   = Product::orderBy('created_at','desc')->paginate(6);
            return view('guest.shop', compact('categories', 'products'));
        }


        public function contact(){
            //category list
            $categories = Category::all();
            
            //return view with categories
            return view('guest.contact', compact('categories'));
        }

        public function about(){
            //category list
            $categories = Category::all();
            
            //return view with categories
            return view('guest.about', compact('categories')); 
        } 




        public function search(Request $request){
            $categories = Category::all();
            $q = $request->input('search_query'); // si tu gardes POST, ça marche aussi
            $products = Product::where('name','LIKE', "%{$q}%")
                            ->orderBy('created_at','desc')
                            ->paginate(12)
                            ->withQueryString(); // garde les paramètres dans l’URL
            return view('guest.shop', compact('products','categories'));
        }


        public function index($categoryId){
            $categories = Category::all();
            $products   = Product::where('category_id', $categoryId)
                            ->orderBy('created_at','desc')
                            ->paginate(6);
            return view('guest.CategoryProduct', compact('categories', 'products'));
        }




public function SubmitContact(Request $request)
{
    // Validation des données du formulaire
 $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]); 

        // Envoi d'email (ou stockage en DB si tu préfères)
        Mail::raw(
            "Nom: {$request->name}\nEmail: {$request->email}\nObjet: {$request->subject}\n\nMessage:\n{$request->message}",
            function ($mail) use ($request) {
                $mail->from('oumaimachamakh667@gmail.com', 'MK Store') // domaine aligné
                    ->replyTo($request->email, $request->name)       // pour répondre au visiteur
                    ->to('oumaimachamakh667@gmail.com')
                    ->subject('Nouveau message de contact : ' . $request->subject);
            }
        );

        return redirect()->route('guest.contact')
                        ->with('success', 'Votre message a été envoyé avec succès !');

}
}

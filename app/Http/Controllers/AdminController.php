<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Orders;
use App\Models\OrderItems;

class AdminController extends Controller
{
    //fonction to show the admin dashboard
      public function dashboard(){
        $u = auth()->user();
        return view('admin.dashboard', compact('u'));
    }

   public function profile(){
        $u= auth()->user(); // Get the authenticated user
        // Pass the user data to the view
        return view('admin.profile', compact('u'));
    }
       
    public function updateProfile(Request $request){
       
      
       Auth::user()->name= $request->name;
       Auth::user()->email= $request->email;
       if($request->password){
           Auth::user()->password= Hash::make($request->password);
       }
       Auth::user()->save();
       
       // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
        
    }
   

     public function index()
    {   $u= auth()->user();
        $orders = Orders::with(['user', 'items.product'])
            ->latest()
            ->paginate(10); // pagination pour gros volumes

        return view('admin.orders.index', compact('orders', 'u'));
    }
    
    public function deleteOrder($id)
{
    // Récupérer la commande par ID
    $order = \App\Models\Orders::find($id);

    // Vérifier si la commande existe
    if (!$order) {
        return redirect('/admin/orders')->with('error', 'Commande introuvable.');
    }

    // Supprimer les lignes de commande associées
    $order->items()->delete();

    // Supprimer la commande elle-même
    $order->delete();

    // Rediriger avec un message de succès
    return redirect('/admin/orders')->with('success', 'Commande supprimée avec succès.');
}



public function show($id)
{
    $u= auth()->user();
    // Récupérer la commande avec ses items
    $order = Orders::with(['items.product'])->find($id);

    // Vérifier si la commande existe
    if (!$order) {
        return redirect('/admin/orders')->with('error', 'Commande non trouvée.');
    }

    return view('admin.orders.detailOrder', compact('order', 'u'));
}


public function updateStatus(Request $request, $id)
{
    // Valider le status
    $request->validate([
        'status' => 'required|in:pending,preparing,delivered,canceled',
    ]);

    // Récupérer la commande
    $order = Orders::find($id);

    if (!$order) {
        return response()->json([
            'success' => false,
            'message' => 'Order not found.'
        ], 404);
    }

    // Mettre à jour le status
    $order->status = $request->status;
    $order->save();

    // Redirect or return a response
    return redirect('/admin/orders')->with('success', 'Order deleted successfully.');
}


}

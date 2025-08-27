<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{  
        //fonction to show the client dashboard
      public function dashboard(){
        return view('client.dashboard');
    }

   public function profile(){   

    $categories = \App\Models\Category::all();
    $products = \App\Models\Product::all();
    $orders = \App\Models\Order::where('user_id', auth()->id())->get();
   $u= auth()->user(); // Get the authenticated user

    return view('client.profile')->with([
        'categories' => $categories,
        'products' => $products,
        'orders' => $orders,
        'u' => $u
    ]);


   }


       public function updateProfile(Request $request){

       // dd($request);

       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|min:6'
        ]);
       
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
       
       // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully !');
        
    }
}

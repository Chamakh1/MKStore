<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // This line retrieves the role of the authenticated user
        // You can use the role to conditionally render views or perform actions
        // For example, you might want to redirect based on the user's role:
         if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
         } else{
            return redirect('/');
         }
        
        // return view('home');
    }
}

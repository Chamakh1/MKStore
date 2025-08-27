<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    // Method to display the list of products
            public function index(Request $request)
            {
                $categories = Category::all(); // ou paginer si tu veux

                $query = Product::query();

                if ($request->filled('search')) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%');
                }

                // paginate (ex : 10 par page) et maintenir les query strings
                $products = $query->paginate(5);
                // Pagination
                $u = auth()->user(); // Get the authenticated user

                // Pass the user and products data to the view
                return view('admin.products.index', compact('categories', 'products', 'u'));
            }
                
            



        // Method to create a new product
        public function createProduct(Request $request) {

            //dd($request);
           // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'price' => 'required|min:0',
                'quantity' => 'required|integer|min:0',
                'category_id' => 'required|exists:categories,id', // Validate category ID
                'image' => 'required', // Validate image
                
            ]);

            

          // Create the product
            $product = new \App\Models\Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category_id; // Set the category ID
            
            
             
            // Handle the image upload
                $newname= uniqid() ;
                $image = $request->file('image');
                $newname=uniqid() . '.' . $image->getClientOriginalExtension();
                
                $image->move(public_path('uploads'), $newname);  // <-- public_path ici !
               
            $product->image=$newname;  


            // Save the product
        
            if ($product->save()) {
                return redirect('/admin/products')->with('message', 'Product created successfully.');
            } else {
                return redirect('/admin/products')->with('message', 'Failed to create product.');
            }
        }

        // Method to delete a product
        public function deleteProduct($id) {
            // Find the product by ID
            $product = \App\Models\Product::find($id);
            unlink(public_path('uploads/' . $product->image)); // Delete the image file from the server
            // Check if the product exists
            if (!$product) {
                
                return redirect('/admin/products')->with('error', 'Product not found.');
            }
            $product->delete();
            // If the product does not exist, redirect with an error message
            return redirect('/admin/products')->with('error', 'Product not found.');    
        }

        // Method to update a product

        public function updateProduct(Request $request) {



            // Find the product by ID
            $product = \App\Models\Product::find($request->id_product);
             //dd($product);
            

            
            // Update the product details
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;

            // Handle the image upload if a new image is provided
            if ($product->image && file_exists(public_path('uploads/' . $product->image))){
                // Delete the old image file from the server
                unlink(public_path('uploads/' . $product->image));
                
                // Upload the new image
                $image = $request->file('image');
                $newname = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $newname);
                $product->image = $newname;
            }

            // Save the updated product

            if ($product->update()) {
                return redirect()->back();
            } else {
                return redirect('/admin/products')->with('error', 'Failed to update product.');
            }


        }

    }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index(Request $request)
        {
            $query = \App\Models\Category::query();

            if ($request->has('search') && !empty($request->search)) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }

            $categories = $query->paginate(5); // Pagination
            $u = auth()->user(); // Get the authenticated user

            // Pass the user and categories data to the view
            return view('admin.categories.index', compact('categories', 'u'));
        }

            
        


    public function createCategory(Request $request) {

        //validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.unique' => 'This category already exists.',
        ]);



       // Create the category
        $category = new \App\Models\Category();
        $category->name = $request->name;
        $category->description = $request->description;
        if($category->save()) {
            return redirect('/admin/categories')->with('success', 'Category created successfully.');
        } else {
            // Handle the error
            return redirect('/admin/categories')->with('name', 'Failed to create category.');
        }

        
        

    
    }


    // Method to delete a category
    public function deleteCategory($id) {
        // Find the category by ID
        $category = \App\Models\Category::find($id);

        // Check if the category exists
        if (!$category) {
            return redirect('/admin/categories')->with('error', 'Category not found.');
        }

        // Delete the category
        $category->delete();

        // Redirect or return a response
        return redirect('/admin/categories')->with('success', 'Category deleted successfully.');
    }

    // Method to update a category
    public function updateCategory(Request $request) {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Find the category by ID
        $id= $request->id_category;
        

        $category = \App\Models\Category::find($id);

        // Check if the category exists
        if (!$category) {
            return redirect('/admin/categories')->with('error', 'Category not found.');
        }

        // Update the category
        $category->name = $request->name;
        $category->description = $request->description;
        if($category->update()) {
            return redirect()->back();
        } else {
            // Handle the error
            return redirect('/admin/categories')->with('error', 'Failed to update category.');
        }

        
        
        }




}

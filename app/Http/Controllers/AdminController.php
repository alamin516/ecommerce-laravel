<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_categories()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function create_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();

        toastr()->closeButton()->timeOut(3000)->addSuccess('Category Created Successfully!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->closeButton()->timeOut(3000)->addSuccess('Category Deleted Successfully!');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }


    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->closeButton()->timeOut(3000)->addSuccess('Category Updated Successfully!');
        return redirect('/admin/categories');
    }


    // Products
    public function all_products()
    {
        $products = Product::all();
        return view('admin.product.all_product', compact('products'));
    }

    public function create_product()
    {
        $categories = Category::all();
        return view('admin.product.create_product',  compact('categories'));
    }
    public function upload_product(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'brand' => 'nullable|string|max:255',
        ]);

        // Create a new Product instance
        $product = new Product();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->category = $validated['category'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];
        $product->brand = $validated['brand'];

        // Handle the image upload
        $image = $request->file('image');
        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $product->image = $validated['image'] = $image->move('upload', $filename);// Save the path to the database
        }

        // Save the product to the database
        $product->save();
        toastr()->closeButton()->timeOut(3000)->addSuccess('Product Added Successfully!');
        return redirect('/admin/products');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
   public function index()
   {
      return view('admin.index');
   }


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
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.product.all_product', compact('products'));
    }

    public function create_product()
    {
        $categories = Category::all();
        return view('admin.product.create_product',  compact('categories'));
    }

    // Create new Product Function
    public function upload_product(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255',
            'regular_price' => 'required|nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'quantity' => 'nullable|string',
            'brand' => 'nullable|string|max:255',
            'flash_sale' => 'nullable|boolean',
            'status' => 'nullable|in:draft,published',
            'specifications' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
        ]);

        // Create a new Product instance
        $product = new Product();
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->category = $validated['category'];
        $product->regular_price = $validated['regular_price'];
        $product->discount_price = $validated['discount_price'];
        $product->quantity = $validated['quantity'];
        $product->brand = $validated['brand'];
        $product->flash_sale = $validated['flash_sale'] ?? false;
        $product->status = $validated['status'] ?? 'draft';
        $product->specifications = $validated['specifications'];
        $product->stock_quantity = $validated['stock_quantity'] ?? 0;
        $product->user_id = Auth::id();


        // Handle the image upload
        $image = $request->file('image');
        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $product->image = $validated['image'] = $image->move('upload', $filename);
        }

        // Save the product to the database
        $product->save();

        toastr()->closeButton()->timeOut(3000)->addSuccess('Product Added Successfully!');
        return redirect('/admin/edit_product/' . $product->id);
    }



    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('upload/' . $product->image);
        if (file_exists(($image_path))) {
            unlink($image_path);
        }

        $product->delete();
        toastr()->closeButton()->timeOut(3000)->addSuccess('Product Deleted Successfully!');
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255',
            'regular_price' => 'required|nullable|numeric',
            'discount_price' => 'nullable|numeric',
            'quantity' => 'nullable|string',
            'brand' => 'nullable|string|max:255',
            'flash_sale' => 'nullable|boolean',
            'status' => 'nullable|in:draft,published',
            'specifications' => 'nullable|string',
            'stock_quantity' => 'nullable|integer',
        ]);

        // Find the existing product by ID
        $product = Product::find($id);

        if (!$product) {
            toastr()->closeButton()->timeOut(3000)->addError('Product not found!');
            return redirect()->back();
        }

        // Update product fields with validated data
        $product->title = $validated['title'];
        $product->description = $validated['description'];
        $product->category = $validated['category'];
        $product->regular_price = $validated['regular_price'];
        $product->discount_price = $validated['discount_price'];
        $product->quantity = $validated['quantity'];
        $product->brand = $validated['brand'];
        $product->flash_sale = $validated['flash_sale'] ?? false;
        $product->status = $validated['status'] ?? 'draft';
        $product->specifications = $validated['specifications'];
        $product->stock_quantity = $validated['stock_quantity'] ?? 0;


        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($product->image && file_exists(public_path('upload/' . basename($product->image)))) {
                unlink(public_path('upload/' . basename($product->image)));
            }

            // Upload the new image
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $filename);
            $product->image = $filename;
        }

        // Save the updated product
        $product->save();

        // Provide success feedback
        toastr()->closeButton()->timeOut(3000)->addSuccess('Product updated successfully!');
        return redirect('/admin/products');
    }

    // update status 
    public function updateStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:products,id',
            'status' => 'required|boolean'
        ]);

        // Find the product and update the status
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => true]);
    }

    // Duplicate Product
    public function duplicate_product($id)
    {
        // Find the existing product by ID
        $originalProduct = Product::find($id);

        if (!$originalProduct) {
            toastr()->closeButton()->timeOut(3000)->addError('Product not found!');
            return redirect()->back();
        }

        // Create a new product instance
        $duplicatedProduct = new Product();

        // Copy attributes from the original product to the new product
        $duplicatedProduct->title = $originalProduct->title . ' (Copy)'; // Optionally modify the title to indicate it's a duplicate
        $duplicatedProduct->description = $originalProduct->description;
        $duplicatedProduct->category = $originalProduct->category;
        $duplicatedProduct->regular_price = $originalProduct->regular_price;
        $duplicatedProduct->discount_price = $originalProduct->discount_price;
        $duplicatedProduct->quantity = $originalProduct->quantity;
        $duplicatedProduct->brand = $originalProduct->brand;
        $duplicatedProduct->flash_sale = false;
        $duplicatedProduct->status = 'draft';
        $duplicatedProduct->specifications = $originalProduct->specifications;
        $duplicatedProduct->stock_quantity = $originalProduct->stock_quantity;

        // Handle image duplication
        if ($originalProduct->image) {
            // Copy the image file to a new location with a unique name
            $imagePath = public_path('upload/' . $originalProduct->image);
            if (file_exists($imagePath)) {
                $newFilename = time() . '_' . $originalProduct->image;
                copy($imagePath, public_path('upload/' . $newFilename));
                $duplicatedProduct->image = $newFilename;
            }
        }

        // Save the duplicated product
        $duplicatedProduct->save();

        // Provide success feedback
        toastr()->closeButton()->timeOut(3000)->addSuccess('Product duplicated successfully!');
        return redirect()->back();
    }


    public function product_search(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort');

        // Start building the query
        $query = Product::where('title', 'like', '%' . $search . '%');

        // Apply sorting based on the selected option
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('regular_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('regular_price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Default sort by newest
                break;
        }

        // Paginate the results
        $products = $query->paginate(5);

        return view('admin.product.all_product', compact('products'));
    }
}

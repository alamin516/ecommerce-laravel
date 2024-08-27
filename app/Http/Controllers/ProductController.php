<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function get_product($id)
    {
        $product = Product::find($id);

        return view('products.single_product', compact('product'));
    }


    public function add_to_cart($id, Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Store the intended URL in the session
            session(['url.intended' => $request->fullUrl()]);

            // Redirect to the login page
            return redirect()->route('login');
        }

        // If the user is authenticated, proceed to add the product to the cart
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $id;
        $data->save();

        toastr()->closeButton()->timeOut(500)->addSuccess('Product added to cart successfully!');

        return redirect()->back();
    }


    public function cart()
    {
        $user_id = Auth::user()->id;
        $product = Product::find($user_id);
        $carts = Cart::where('user_id', $user_id)->get();
        

        return view('carts.index', compact('carts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_product($id)
    {
        $product = Product::find($id);
        
        return view('products.single_product', compact('product'));
    }
}
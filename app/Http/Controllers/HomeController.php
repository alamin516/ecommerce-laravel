<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home()
   {  
      $products = $this-> getProducts();
      return view('home.index', compact('products'));
   }

   private function getProducts()
   {
      return [
         ['url' => 'https://example.com/product/1', 'img' => 'https://example.com/images/product1.png', 'discount' => '5%', 'price' => '৳9,990.01', 'old_price' => '৳10,690.00'],
         ['url' => 'https://example.com/product/2', 'img' => 'https://example.com/images/product2.png', 'discount' => '10%', 'price' => '৳8,990.01', 'old_price' => '৳9,990.00'],
         ['url' => 'https://example.com/product/3', 'img' => 'https://example.com/images/product3.png', 'discount' => '15%', 'price' => '৳7,990.01', 'old_price' => '৳9,990.00'],
         ['url' => 'https://example.com/product/4', 'img' => 'https://example.com/images/product4.png', 'discount' => '20%', 'price' => '৳6,990.01', 'old_price' => '৳8,990.00'],
         ['url' => 'https://example.com/product/5', 'img' => 'https://example.com/images/product5.png', 'discount' => '25%', 'price' => '৳5,990.01', 'old_price' => '৳7,990.00'],
         ['url' => 'https://example.com/product/6', 'img' => 'https://example.com/images/product6.png', 'discount' => '30%', 'price' => '৳4,990.01', 'old_price' => '৳6,990.00'],
     ];
   }

   public function index()
   {
      return view('admin.index');
   }

  
}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch products with their related categories
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
}


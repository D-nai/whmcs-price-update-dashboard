<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pricing;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $pricings = Pricing::whereIn('id', $products->pluck('id'))->get();
        return view('index', compact('products', 'pricings'));
    }
}

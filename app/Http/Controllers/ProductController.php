<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::sortable()->orderBy('id', 'DESC')->simplePaginate(5);
        return view('products',compact('products'));
    }

    public function createProduct(Request $request) {
        $request->validate([
            'ean_13' => 'required|unique:App\Models\Product|min:1',
            'title' => 'required|min:1',
            'stock' => 'required|min:0',
            'cost' => 'required|integer|min:0',
        ]);

        $product = new Product();
        $product->ean_13 = $request->ean_13;
        $product->title = $request->title;
        $product->stock = $request->stock;
        $product->cost = $request->cost;
        $product->save();

        return redirect()->back();
    }

}

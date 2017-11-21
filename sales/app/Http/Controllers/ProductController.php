<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.list', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('products.new', [
            'categories' => $categories,
            'product' => $product,
            'path_name' => route('products.store'),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $img_path = $request->file('image')->store('products');

        $prod = new Product($validatedData);
        $prod->image = $img_path;
        $prod->save();
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.new', [
            'categories' => $categories,
            'product' => $product,
            'path_name' => route('products.update', $product),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}

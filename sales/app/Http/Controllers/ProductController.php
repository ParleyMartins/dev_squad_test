<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'method' => '',
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

        $img_path = $request->file('image')->store('public');

        $prod = new Product($validatedData);
        $prod->image = Storage::url($img_path);
        $prod->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product){

    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.new', [
            'categories' => $categories,
            'product' => $product,
            'path_name' => route('products.update', $product),
            'method' => method_field('PATCH'),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        if($request->file('image')){
            dd($product->image);
            Storage::delete($product->image);
            // $img_path = $request->file('image')->store('public');
        }
        $product->fill($request->all());
        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

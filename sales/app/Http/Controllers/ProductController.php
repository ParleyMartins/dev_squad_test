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
        $categories = Category::all();

        return view('products.list',
            ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('products.new', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|max:10000',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $img_name = $request->file('image')->store('public');

        $prod = new Product($validatedData);
        $prod->image_name = $img_name;
        $prod->image_url = Storage::url($img_name);
        $prod->save();
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.new', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        dd($input);

        if($request->file('image')){
            Storage::delete($product->image_name);
            $img_name = $request->file('image')->store('public');
            $product->image_name = $img_name;
            $product->image_url = Storage::url($img_name);
        }

        $product->fill($input);
        $product->save();
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image_name);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function viewImport(Request $request){
        return view('products.import');
    }

    public function import(Request $request){
        $request->file('import_data')->store('imports');
        return redirect()->route('products.index');
    }
}

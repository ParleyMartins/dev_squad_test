<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();

        $categories = [];
        foreach ($cats as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        return $categories;
    }

    public function show(Category $category)
    {
        return $category;
    }
}

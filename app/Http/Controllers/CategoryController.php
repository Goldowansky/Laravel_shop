<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('categories.list', compact('categories'));
    }

    public function show(Category $category)
    {
        $items = Item::where('category_id',$category->id)->get();
        $categoryName = $category->name;

        return view('categories.show', compact('items'), compact('categoryName'));
    }
}
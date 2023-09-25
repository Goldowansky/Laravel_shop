<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $isAdminRequest = Str::contains(request()->getRequestUri(), 'admin');
        
        return view($isAdminRequest ? 'categories.admin.list' : 'categories.list', compact('categories'));
    }

    public function show(Category $category)
    {
        $items = Item::where('category_id',$category->id)->get();
        $categoryName = $category->name;
        $isAdminRequest = Str::contains(request()->getRequestUri(), 'admin');

        return view($isAdminRequest ? 'categories.admin.show' : 'categories.show', compact('items'), compact('categoryName'));
    }

    public function create()
    {
        return view('categories.admin.create');
    }
    
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.admin.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $category->update([
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('admin.categories.index', $category);
    }

    public function destroy(Category $category)
    {
        $items = Item::where('category_id',$category->id)->get();
        foreach ($items as $item) {
            $item->delete();
        }
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}

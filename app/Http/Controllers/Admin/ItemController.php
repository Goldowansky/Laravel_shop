<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryItemRequest;
use App\Http\Requests\UpdateCategoryItemRequest;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    // public function create()
    // {
    //     $categories = Category::all();

    //     return view('items.admin.create', compact('categories'));
    // }

    public function create(Category $category)
    {
        return view('items.admin.create', compact('category'));
    }

    // public function store(StoreItemRequest $request)
    // {
    //     Item::create($request->validated());

    //     return redirect()->route('admin.categories.show', $request->input('category_id'));
    // }

    public function store(StoreCategoryItemRequest $request, Category $category)
    {
        $item = $category->items()->create($request->validated());

        return redirect()->route('admin.categories.show', $category);
    }

    public function edit(Category $category, Item $item)
    {
        $categories = Category::all();
        
        return view('items.admin.edit', compact('item', 'categories', 'category'));
    }

    public function update(UpdateCategoryItemRequest $request, Category $category, Item $item)
    {
        $item->update($request->validated());

        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category, Item $item)
    {
        $item->delete();
        
        return redirect()->route('admin.categories.show', $category);
    }
}

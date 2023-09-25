<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.list',compact('items'));
    }
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }
    
    public function create()
    {
        $categories = Category::all();

        return view('items.admin.create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->input('name');
        $item->category_id = $request->input('category_id');
        $item->description = $request->input('description');
        $item->save();

        return redirect()->route('admin.categories.show', $item->category_id);
    }
    
    public function edit(Item $item)
    {
        $categories = Category::all();
        
        return view('items.admin.edit', compact('item'), compact('categories'));
    }
    
    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.categories.show', $item->category_id);
    }
    
    public function destroy(Item $item)
    {
        $item->delete();
        
        return redirect()->route('admin.categories.show', $item->category_id);
    }
}
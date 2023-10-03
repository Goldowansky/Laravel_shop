<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('categories.admin.list', compact('categories'));
    }
    
    public function show(Category $category)
    {
        return view('categories.admin.show', compact('category'));
    }

    public function create()
    {
        return view('categories.admin.create');
    }
    
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());
        
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.admin.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        
        return redirect()->route('admin.categories.index', $category);
    }

    public function destroy(Category $category)
    {
        $category->photos->each(fn($photo) => $photo->deleteFile());
        $category->photos()->delete();
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}

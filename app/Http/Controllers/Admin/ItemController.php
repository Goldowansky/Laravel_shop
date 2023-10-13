<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryItemRequest;
use App\Http\Requests\UpdateCategoryItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Photo;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        if (Gate::denies('be-admin')) {
            throw new AuthorizationException('You are not authorized to perform this action.');
        }

        $item = $category->items()->create($request->validated()); //переписати на окремі інпути
        $item->modifications()->create(['label' => $request->input('modification')]);
        if ($request->hasFile('photo')) {
            $photo = $item->photos()->create(['src' => basename(Storage::putFile('public/photos',$request->file('photo')))]);
            $item->main_photo_id = $photo->id;
            $item->save();
        }

        return redirect()->route('admin.categories.show', $category);
    }

    public function edit(Category $category, Item $item)
    {
        if (Gate::denies('be-admin')) {
            throw new AuthorizationException('You are not authorized to perform this action.');
        }
        
        $categories = Category::all();
        
        return view('items.admin.edit', compact('item', 'categories', 'category'));
    }

    public function update(UpdateCategoryItemRequest $request, Category $category, Item $item)
    {
        if (Gate::denies('be-admin')) {
            throw new AuthorizationException('You are not authorized to perform this action.');
        }
        
        $item->update($request->validated());

        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category, Item $item)
    {
        if (Gate::denies('be-admin')) {
            throw new AuthorizationException('You are not authorized to perform this action.');
        }

        $item->photos->each(fn($photo) => $photo->deleteFile());
        
        $item->photos()->delete();
        $item->delete();
        
        return redirect()->route('admin.categories.show', $category);
    }
}

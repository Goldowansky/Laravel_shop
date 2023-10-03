<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModificationRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Modification;

class ModificationController extends Controller
{
    public function store(StoreModificationRequest $request, Category $category, Item $item)
    {
        $item->modifications()->create($request->validated());

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }
    public function destroy(Category $category, Item $item, Modification $modification)
    {
        $modification->delete();

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }
}

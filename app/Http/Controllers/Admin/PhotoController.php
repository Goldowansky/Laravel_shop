<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(StorePhotoRequest $request, Category $category, Item $item)
    {
        $src = basename(Storage::putFile('public/photos',$request->file('photo')));
        $item->photos()->create([
            'main' => $item->mainPhoto === null,
            'src' => $src,
        ]);

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }

    public function destroy(Category $category, Item $item, Photo $photo)
    {
        $photo->deleteFile();
        $photo->delete();
        
        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }

    public function setMain(Category $category, Item $item, Photo $photo)
    {
        $previousMain = $item->mainPhoto;
        if ($previousMain != null) {
            $previousMain->main = false;
            $previousMain->save();
        }
        $photo->main = true;
        $photo->save();

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }
}

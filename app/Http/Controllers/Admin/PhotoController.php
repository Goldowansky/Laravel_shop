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
        $photo = Photo::create([
            'item_id' => $item->id,
            'src' => $src,
        ]);
        if ($item->main_photo_id === null) {
            $item->main_photo_id = $photo->id;
            $item->save();
        }

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }

    public function destroy(Category $category, Item $item, Photo $photo)
    {
        $photoId = $photo->id;
        $photo->deleteFile();
        $photo->delete();
        
        if (($photoId === $item->main_photo_id) && ($item->photos()->isNotEmpty())) {
            $item->main_photo_id = $item->photos()->first()->id;
        }
        
        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }

    public function setMain(Category $category, Item $item, Photo $photo)
    {
        $item->main_photo_id = $photo->id;
        $item->save();

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }
}

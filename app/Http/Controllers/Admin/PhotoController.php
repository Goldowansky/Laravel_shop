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
    public function create(Category $category, Item $item)
    {
        return view('photos.admin.create', compact('category','item'));
    }

    public function store(StorePhotoRequest $request, Category $category, Item $item)
    {
        $src = basename(Storage::putFile('public/photos',$request->file('photo')));
        Photo::create([
            'item_id' => $item->id,
            'src' => $src,
        ]);

        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return redirect()->route('admin.categories.index');
    }

    public function setMain(Category $category, Item $item, Photo $photo)
    {
        // dd($item);
        $item->main_photo_id = $photo->id;
        $item->save();

        return redirect()->route('admin.categories.items.edit', ['category' => $category, 'item' => $item]);
    }
}

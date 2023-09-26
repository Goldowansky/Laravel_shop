<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }
}
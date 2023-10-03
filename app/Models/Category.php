<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function photos(): HasManyThrough
    {
        return $this->hasManyThrough(Photo::class, Item::class);
    }

    public function getRandomPhoto()
    {
        return $this->photos->isEmpty() ? Storage::url('nophoto.jpg') : Storage::url('public/photos/'.$this->photos->random()->src);
    }
}

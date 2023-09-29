<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        // 'main_photo_id',
    ];
    protected $attributes = [
        'main_photo_id' => null,
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    
    public function mainPhoto()
    {
        return $this->belongsTo(Photo::class, 'main_photo_id');
    }
}

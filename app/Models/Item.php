<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'main_photo_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }
    
    public function mainPhoto()
    {
        return $this->belongsTo(Photo::class, 'main_photo_id');
    }
    public function getPhotoUrl()
    {
        return $this->main_photo_id === null ? Storage::url('nophoto.jpg') : Storage::url('photos/'.$this->mainPhoto()->first()->src);
    }
}
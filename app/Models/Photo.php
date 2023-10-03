<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'item_id'
    ];
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function deleteFile()
    {
        $filePath = 'public/photos/'.$this->src;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}

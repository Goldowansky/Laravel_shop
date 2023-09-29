<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

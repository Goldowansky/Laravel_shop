<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'price',
        'item_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

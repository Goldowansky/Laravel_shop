<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'photo' => 'required|image|max:2048',
        ];
    }
}

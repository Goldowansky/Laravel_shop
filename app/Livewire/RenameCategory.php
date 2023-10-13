<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class RenameCategory extends Component
{
    public $category;
    public $name;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function updatedName()
    {
        $this->resetErrorBag();
        $validatedData = Validator::make(
            ['name' => $this->name,],
            ['name' => ['required', 'regex:/^[\p{L}0-9\'\s]+$/u', Rule::unique('categories')->ignore($this->category->id),]],
        )->validate();

        $this->category->update($validatedData);
    }
    
    public function render()
    {
        return view('livewire.rename-category');
    }
}

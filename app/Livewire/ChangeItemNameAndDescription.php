<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ChangeItemNameAndDescription extends Component
{
    public $item;
    public $name;
    public $description;

    public function mount()
    {
        $this->name = $this->item->name;
        $this->description = $this->item->description;
    }
    
    public function updatedName()
    {
        $this->resetErrorBag();
        $validatedData = Validator::make(
            ['name' => $this->name,],
            ['name' => ['required', 'regex:/^[\p{L}0-9\'\s]+$/u', Rule::unique('items')->ignore($this->item->id),],],
        )->validate();

        $this->item->update($validatedData);
    }

    public function updatedDescription()
    {
        $this->resetErrorBag();
        $validatedData = Validator::make(
            ['description' => $this->description,],
            ['description' => ['required'],],
        )->validate();

        $this->item->update($validatedData);
    }

    // public function update('')
    // {

    // }
    
    public function render()
    {
        return view('livewire.change-item-name-and-description');
    }
}

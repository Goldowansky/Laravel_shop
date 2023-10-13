<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Modification;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ModificationControll extends Component
{
    public Item $item;
    
    #[Rule('required|min:2')] 
    public $label;

    public function delete(Modification $modification)
    {
        $modification->delete();
    }

    public function save()
    {
        $this->validate();
        $this->item->modifications()->create(['label' => $this->label]);
        $this->label="";
    }

    public function render()
    {
        return view('livewire.modification-controll');
    }
}

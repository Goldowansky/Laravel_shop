<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoControll extends Component
{
    use WithFileUploads;
    
    public Item $item;

    public $photoId;

    #[Rule('required|image|max:2048')]
    public $photo;

    public function mount()
    {

        $this->photoId = $this->item->mainPhoto === null ? null : $this->item->mainPhoto->id;
    }

    public function updatedPhotoId()
    {
        $selectedPhoto = Photo::find($this->photoId);
        $previousMain = $selectedPhoto->item->mainPhoto;
        if ($previousMain != null) {
            $previousMain->update(['main' => false,]);
        }
        $selectedPhoto->update(['main' => true,]);
    }

    public function save()
    {
        $src = basename(Storage::putFile('public/photos', $this->photo));
        $this->item->photos()->create([
            'main' => $this->item->mainPhoto === null,
            'src' => $src,]);
    }

    public function delete(Photo $photo)
    {
        $mainPhotoId = $photo->item->mainPhoto->id;
        if ($mainPhotoId !== $photo->id) {
            $photo->deleteFile();
            $photo->delete();
        }
    }

    public function render()
    {
        return view('livewire.photo-controll');
    }
}

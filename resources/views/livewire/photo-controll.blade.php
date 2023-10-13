<div>
    @foreach ($item->photos as $photo)
    <div style="display: inline-block; width: 200px; height: 250px; vertical-align: top;">
        <img src="{{ Storage::url('photos/'.$photo->src) }}" width="200" height="200">
        <input type="radio" wire:model.live="photoId" value="{{ $photo->id }}">
        <button wire:click=delete({{ $photo->id }})>Видал.</button>
    </div>
    @endforeach
    <form wire:submit="save" style="display: inline-block; width: 200px; height: 250px; vertical-align: top;">
        <label for="photo" style="cursor: pointer; display: inline-block; width: 200px; height: 200px; background: #EEE; color: #CCC; font-size: 7rem; border-radius: 1rem; text-align: center; line-height: 180px;">+</label>
        <input type="file" wire:model="photo" id="photo" style="display: none;">
        <button type="submit" id="photoSubmit">Зберегти</button>
    </form>
</div>

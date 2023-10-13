<div>
    @foreach ($item->modifications as $modification)
    <span>
        <span style="padding: 0.5rem; border: #777 1px solid;">{{ $modification->label }}</span>
        <button wire:click="delete({{ $modification->id }})" style="padding: 0.5rem;"">×</button>
    </span>
    @endforeach
    <span>
        <input type="text" wire:model="label" style="padding: 0.5rem; border: #777 1px solid; width: 5rem;" id="mod" placeholder="додати мод.">
        <button wire:click="save()" style="padding: 0.5rem;"">+</button>
    @error('label')
        <span style="color: red;">{{ $message }}</span>
    @enderror
    </span>
</div>

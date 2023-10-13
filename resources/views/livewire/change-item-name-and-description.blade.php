<div>
    <div>
        <div>
            <label for="name">Назва товару</label>
            <input type="text" wire:model.live.debounce.300ms="name" id="name">
            @error('name')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="desc">Опис товару</label>
            <input type="text" wire:model.live.debounce.300ms="description" id="desc">
            @error('description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
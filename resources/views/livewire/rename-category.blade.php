<div>
    <h1>Редагувати категорію [{{ $name }}]</h1>
    <input wire:model.live.debounce.300ms="name" type="text">
    @error('name')
    <span style="color: red">{{ $message }}</span>
    @enderror
</div>
@props([
    'label',
    'name',
    
])

<div>
    <label 
        for="{{ $name }}" 
        class="block text-sm font-medium">{{ $label }}</label>


    <input
        {{ $attributes }} 
        id="{{ $name }}" 
        type="text" 
        class="w-full border rounded px-2 py-1"
        name="{{ $name }}">

    @error($name)
        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
    @enderror
</div>
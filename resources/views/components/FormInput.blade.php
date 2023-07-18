<div>
    <label for="{{ $name }}" class="block">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'border border-gray-400 px-2 py-1 rounded']) }}>
    @error($name)
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>

@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-grey-500 font-bold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>

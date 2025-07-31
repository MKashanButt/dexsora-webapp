@props(['active'])

@php
    $text = config('theme.text.default');
    $classes =
        $active ?? false
            ? "flex items-center justify-between w-full p-2 text-xs font-medium text-[$text] bg-white border-white rounded-lg"
            : 'flex items-center justify-between w-full p-2 py-1 text-xs font-medium bg-transparrent border-2 border-white text-white border-white rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

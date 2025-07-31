@php
    $btnColor = 'bg-[' . config('theme.primary') . ']';
    $textColor = 'text-[' . config('theme.text.inverted') . ']';
    $focusRing = 'ring-[' . config('theme.primary') . ']';
@endphp

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-between items-center rounded-md px-4 py-2 ' . $btnColor . ' border border-transparent font-semibold text-xs ' . $textColor . ' uppercase tracking-widest hover:' . $btnColor . '/70 focus:' . $btnColor . '/70 active:' . $btnColor . '/70 focus:outline-none focus:ring-2 focus:' . $focusRing . ' focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

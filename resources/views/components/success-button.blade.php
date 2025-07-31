@php
    $btnColor = 'bg-[' . config('theme.semantic.success') . ']';
    $textColor = 'text-[' . config('theme.text.inverted') . ']';
@endphp
<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md px-4 py-2 ' . $btnColor . ' border border-transparent font-semibold text-xs ' . $textColor . ' uppercase tracking-widest hover:' . $btnColor . '/70 focus:' . $btnColor . '/70 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

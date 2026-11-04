@props(['name', 'filled' => false, 'size' => 'md'])

@php
    $sizeClass = match($size) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
        default => 'text-base',
    };
@endphp

<span {{ $attributes->merge(['class' => "material-symbols-outlined $sizeClass leading-none "]) }}
      @if($filled) style="font-variation-settings: 'FILL' 1;" @endif>
    {{ $name }}
</span>


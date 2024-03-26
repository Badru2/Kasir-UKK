@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center p-2 rounded-lg dark:text-white hover:bg-blue-600 dark:hover:bg-gray-700 group bg-blue-500 text-white'
            : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

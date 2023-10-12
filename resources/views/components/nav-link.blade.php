@props(['active', 'button_solid' => false, 'button_outline' => false])

@php

if(($button_solid ?? false) || ($button_outline ?? false)) {


    if($button_solid) {

        $classes = 'inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-primary-color hover:bg-primary-color-500 focus:outline-none focus:border-primary-color-500 focus:shadow-outline-indigo active:bg-primary-color-500 transition ease-in-out duration-150';

    } else {

        $classes = 'inline-flex items-center px-4 py-2 border border-solid border-secondary-color text-base leading-6 font-medium rounded-md text-secondary-color bg-white
        hover:text-secondary-color
        hover:bg-gray-100
        focus:outline-none focus:border-secondary-color focus:shadow-outline-primary active:bg-gray-50 transition ease-in-out duration-150';
    }

} else {

    $classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-secondary-color focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-secondary-color hover:text-secondary-color hover:border-secondary-color focus:outline-none focus:text-secondary-color focus:border-secondary-color transition duration-150 ease-in-out';
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

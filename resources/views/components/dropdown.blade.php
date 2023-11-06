@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white ring-1 ring-black ring-opacity-5', 'dropdownClasses' => ''])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0 mt-2';
        break;
    case 'top':
        $alignmentClasses = 'origin-top mt-2';
        break;
    case 'none':
    case 'false':
        $alignmentClasses = 'w-full mt-0 shadow-none rounded-none';
        $contentClasses = 'rounded-[0_0_6px_6px] border-x-[1px] border-b border-solid border-secondary-color bg-gray-50 py-1';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0 mt-2';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div {!! $attributes->merge(['class' => 'relative']) !!} x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }} {{ $dropdownClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

@php
    $class ??= null;
@endphp

<div class="{{ $class }} tw-flex tw-items-center tw-gap-x-1.5">
    <input type="hidden" value="0" name="{{ $name }}">

    <input 
        @checked(old($name, $value ?? false))
        value="1"
        type="checkbox" 
        name="{{ $name }}" 
        id="{{ $name }}"
        class="tw-w-4 tw-h-4 tw-bg-gray-100 tw-border-gray-300 tw-rounded focus:tw-ring-blue-500 focus:tw-ring-2"
        role="switch"
    >
    <label for="{{ $name }}" class="tw-text-sm tw-font-medium tw-text-gray-900">{{ $label }}</label>
</div>
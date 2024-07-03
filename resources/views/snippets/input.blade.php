@php
    $label ??= null;
    $placeholder ??= '';
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div class="{{ $class }}">
    <label for="{{ $name }}" class="tw-block tw-mb-1 tw-text-sm tw-font-medium tw-text-gray-900">{{ $label }}</label>

    @if($type == 'textarea')
        <textarea 
            id="{{ $name }}" 
            name="{{ $name }}" 
            class="tw-block tw-p-2.5 tw-w-full tw-text-sm tw-text-gray-900 tw-bg-gray-50 tw-rounded-lg tw-border-2 tw-border-gray-300 focus:tw-ring-blue-500 focus:tw-border-blue-500 @error($name) tw-bg-red-100 tw-border-red-700 @enderror"
            placeholder="{{ $placeholder }}" 
            rows="3"
        >{{ old($name, $value) }}</textarea>
    @else
        <input 
            type="{{ $type }}" 
            id="{{ $name }}" 
            name="{{ $name }}" 
            class="tw-bg-gray-50 tw-border-2 tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg focus:tw-ring-blue-500 focus:tw-border-blue-500 tw-block tw-w-full tw-p-2.5 @error($name) tw-bg-red-100 tw-border-red-700 @enderror" 
            placeholder="{{ $placeholder }}" 
            value="{{ old($name, $value) }}" 
        />
    @endif

    

    @error($name)
        <div class="tw-text-sm tw-text-red-600">
            {{ $message }}
        </div>
    @enderror
</div>
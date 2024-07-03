@php
    $label ??= null;
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

<div class="{{ $class }}">
    <label for="{{ $name }}" class="tw-block tw-mb-1 tw-text-sm tw-font-medium tw-text-gray-900">{{ $label }}</label>


    <select 
        id="{{ $name }}" 
        name="{{ $name }}[]"
        multiple
    >
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="tw-text-sm tw-text-red-600">
            {{ $message }}
        </div>
    @enderror
</div>
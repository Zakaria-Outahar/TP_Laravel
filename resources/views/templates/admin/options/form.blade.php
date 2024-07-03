@extends('layout.admin')

@section('title', $option->exists ? "Éditer une Option" : "Créer une Option")

@section('content')
    <h1>@yield('title')</h1>

    {{-- @dump($option) --}}

    <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post" class="tw-text-lg tw-w-2/3 tw-mx-auto tw-mt-10">
        @csrf
        @if($option->exists)
            @method('put')
        @endif

        @include('snippets.input', [
            'name' => 'name', 'label' => 'Nom', 'placeholer' => 'Nom de l\'option' ,'value' => $option->name
        ])

        <div class="tw-text-center">
            <button class="tw tw-bg-sky-600 tw-border tw-border-sky-700 tw-rounded-2xl tw-text-white tw-w-full tw-p-2.5 tw-mt-8 tw-inline-block">
                {{ $option->exists ? 'Modifier' : 'Créer'}}
            </button>
        </div>
    </form>
@endsection
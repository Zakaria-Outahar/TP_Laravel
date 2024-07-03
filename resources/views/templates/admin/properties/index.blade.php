@extends('layout/admin')

@section('title', 'Tous les Biens')

@php
    $add_text = 'Ajouter un Bien';
@endphp

@section('content')

    @if (session('success'))
        <div class="tw-bg-green-100 tw-text-center tw-text-xl tw-py-5 tw-font-bold tw-mb-5">
            {{ session('success') }}
        </div>
    @endif

    <div class="tw-flex tw-justify-between tw-items-center">
        <h1>@yield('title')</h1>
        <a class="tw-px-10 tw-py-3 tw-bg-blue-800 tw-text-white tw-rounded-full" href="{{ route('admin.property.create') }}">{{ $add_text }}</a>
    </div>

    <table class="tw-w-full tw-text-sm tw-text-left rtl:tw-text-right tw-text-gray-500 dark:tw-text-gray-400 tw-mt-6">
        <thead class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-50 dark:tw-bg-gray-700 dark:tw-text-gray-400">
            <tr>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Titre
                </th>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Surface
                </th>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Prix
                </th>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Ville
                </th>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700">
                    <td class="tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap">{{ $property->title }}</td>
                    <td class="tw-px-6 tw-py-4">{{ $property->surface }} m²</td>
                    <td class="tw-px-6 tw-py-4">{{ number_format($property->price, thousands_separator:' ') }} €</td>
                    <td class="tw-px-6 tw-py-4">{{ $property->city }}</td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-gap-x-2">
                            <a href="{{ route('admin.property.edit', $property) }}" class="tw-px-4 tw-py-2.5 tw-rounded-full tw-bg-slate-300 tw-text-slate-800">Éditer</a>

                            <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="tw-px-4 tw-py-2.5 tw-rounded-full tw-bg-red-500 tw-text-slate-50">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="tw-mt-8">
        {{ $properties->links() }}
    </div>
@endsection
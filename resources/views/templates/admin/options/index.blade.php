@extends('layout.admin')

@section('title', 'Toutes les Options')

@php
    $add_text = 'Ajouter une Option';
@endphp

@section('content')

    @if (session('success'))
        <div class="tw-bg-green-100 tw-text-center tw-text-xl tw-py-5 tw-font-bold tw-mb-5">
            {{ session('success') }}
        </div>
    @endif

    <div class="tw-flex tw-justify-between tw-items-center">
        <h1>@yield('title')</h1>
        <a class="tw-px-10 tw-py-3 tw-bg-blue-800 tw-text-white tw-rounded-full" href="{{ route('admin.option.create') }}">{{ $add_text }}</a>
    </div>

    <table class="tw-w-full tw-text-sm tw-text-left rtl:tw-text-right tw-text-gray-500 dark:tw-text-gray-400 tw-mt-6">
        <thead class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-50 dark:tw-bg-gray-700 dark:tw-text-gray-400">
            <tr>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Nom
                </th>
                <th scope="col" class="tw-px-6 tw-py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr class="tw-bg-white tw-border-b dark:tw-bg-gray-800 dark:tw-border-gray-700">
                    <td class="tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap">{{ $option->name }}</td>
                    <td class="tw-px-6 tw-py-4">
                        <div class="tw-flex tw-gap-x-2">
                            <a href="{{ route('admin.option.edit', $option) }}" class="tw-px-4 tw-py-2.5 tw-rounded-full tw-bg-slate-300 tw-text-slate-800">Éditer</a>

                            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
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
        {{ $options->links() }}
    </div>
@endsection
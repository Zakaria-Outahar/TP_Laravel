@extends('layout.admin')

@section('title', $property->exists ? "Éditer un Bien" : "Créer un Bien")

@section('content')
    <h1>@yield('title')</h1>

    {{-- @dump($property) --}}

    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" class="tw-text-lg tw-w-2/3 tw-mx-auto tw-mt-10">
        @csrf
        @if($property->exists)
            @method('put')
        @endif

        <div class="tw-grid tw-grid-cols-2 tw-mb-6 tw-gap-x-3">
            @include('snippets.input', [
                'label' => 'Titre',
                'name' => 'title',
                'placeholder' => 'Titre du bien',
                'value' => $property->title
            ])
            
            <div class="tw-grid tw-grid-cols-2 tw-gap-x-3">
                @include('snippets.input', [
                    'label' => 'Surface (m²)',
                    'name' => 'surface',
                    'placeholder' => 'Surface du bien',
                    'value' => $property->surface
                ])

                @include('snippets.input', [
                    'label' => 'Prix (€)',
                    'name' => 'price',
                    'placeholder' => 'Prix du bien',
                    'value' => $property->price
                ])
            </div>

        </div>

        @include('snippets.input', [
            'label' => 'Description',
            'type' => 'textarea',
            'name' => 'description',
            'class' => 'tw-mb-6',
            'placeholder' => 'Décrivez le bien',
            'value' => $property->description
        ])

        <div class="tw-grid tw-grid-cols-3 tw-mb-6 tw-gap-x-3">
            @include('snippets.input', [
                'label' => 'Pièces',
                'name' => 'rooms',
                'placeholder' => 'Nombre de pièce',
                'value' => $property->rooms
            ])
            @include('snippets.input', [
                'label' => 'Chambres',
                'name' => 'bedrooms',
                'placeholder' => 'Nombre de chambres',
                'value' => $property->bedrooms
            ])
            @include('snippets.input', [
                'label' => 'Étage',
                'name' => 'floor',
                'placeholder' => 'Étage du bien',
                'value' => $property->floor
            ])
        </div>

        <div class="tw-grid tw-grid-cols-3 tw-mb-6 tw-gap-x-3">
            @include('snippets.input', [
                'label' => 'Adresse',
                'name' => 'address',
                'placeholder' => 'Adresse',
                'value' => $property->address
            ])
            @include('snippets.input', [
                'label' => 'Ville',
                'name' => 'city',
                'placeholder' => 'Ville',
                'value' => $property->city
            ])
            @include('snippets.input', [
                'label' => 'Code Postal',
                'name' => 'postal_code',
                'placeholder' => 'Code postal',
                'value' => $property->postal_code
            ])
        </div>

        <div class="tw-flex tw-justify-between">
            @include('snippets.select', [
                'name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'options' => $options, 'multiple' => true
            ])
    
            <div>
                @include('snippets.checkbox', [
                'name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold
                ])
            </div>
        </div>

        <div class="tw-text-center">
            <button class="tw tw-bg-sky-600 tw-border tw-border-sky-700 tw-rounded-2xl tw-text-white tw-w-full tw-p-2.5 tw-mt-8 tw-inline-block">
                {{ $property->exists ? 'Modifier' : 'Créer'}}
            </button>
        </div>
    </form>
@endsection
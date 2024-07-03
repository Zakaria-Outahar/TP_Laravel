<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite([
        'resources/css/tailwind.css',
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body>
    @include('sections.header')

    @if($errors->any())
        <ul class="tw-list-disc tw-bg-red-200 tw-text-red-700 tw-w-2/3 tw-text-center tw-mx-auto tw-mt-6 tw-py-3">
            @foreach ($errors->all() as $error)
                <li class="tw-inline-block">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <main class="tw-py-8 tw-px-20">
        @yield('content')
    </main>
</body>
</html>
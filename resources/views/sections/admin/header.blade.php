<header class="tw-bg-blue-300 tw-py-4 tw-px-20">
    <nav class="tw-flex tw-gap-x-8">
        <a href="{{ route('home') }}">Accueil</a>

        @php
            // $classMethods = get_class_methods(request()->route());
            $route = request()->route()->getName();
        @endphp

        <div class="tw-ml-auto tw-flex tw-gap-x-8">
            <a href="{{ route('admin.index') }}" @class(['tw-underline' => $route == "admin.index"])>Admin</a>
            <a href="{{ route('admin.property.index') }}" @class(['tw-underline' => str_contains($route, 'property.')])>Gérer les biens</a>
            <a 
                href="{{ route('admin.option.index') }}" 
                @class(['tw-underline' => str_contains($route, 'option.')])
            >Gérer les options</a>
        </div>
    </nav>
</header>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Comunidades') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="container-fluid">
    <x-jet-banner />
    <div class="row d-block">
        @livewire('navigation-menu')
    </div>
    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif
    
    <div class="row">
        <!-- component aside navbar -->
        <div class="col-12 col-sm-3 col-lg-2 p-0 bg-black collapse show" id="collapseExample">

            <div id="accordion">
                <div class="bg-dark card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link bg-black" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                @lang('ADMINISTRATOR')
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="bg-black collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @forelse($navDarkLinks as $link)
                            <x-jet-responsive-nav-link href="{{ route($link['href']) }}" :active="request()->routeIs($link['name'])">
                                {{ __($link['text']) }}
                            </x-jet-responsive-nav-link>
                            @empty
                            <h1>El menú no esta disponible</h1>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="card bg-dark">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('OWNER')
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse bg-black" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <x-jet-responsive-nav-link href="{{ route('comunidades.index') }}" :active="request()->routeIs('comunidades.index')">
                                @lang('Propiedades')
                            </x-jet-responsive-nav-link>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Page Content -->
        <div class="col-12 col-sm-9 col-lg-10 p-2">
            {{ $slot }}
        </div>
        
        <footer class="col-12 col-sm-12 col-lg-12 mt-auto p-2 bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

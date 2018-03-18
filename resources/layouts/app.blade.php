<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@includeIf('parts.hiddenCredits')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Klaravel, by Sunnyface.com</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @stack('stylesheets')
    @include('klaravel::_klara._parts._styles')
    <script>
        window.Larapp = {!! json_encode([
            'csrfToken' => csrf_token(),
            'state' => ['user' => Auth::user()],
        ]) !!};
        @stack('js')
    </script>
</head>
<body>
    <div id="app" class="crud-wrapper">
        {{-- @includeIf(config('ksoft.modules.crud.header', 'klaravel::_parts.header')) --}}
        @include('klaravel::_parts.header')
        <div class="album py-5 bg-light">
            @yield('content')
        </div>
        @include('klaravel::_parts.footer')
        {{-- @includeIf(config('ksoft.modules.crud.footer', 'klaravel::_parts.footer')) --}}
        @stack('modals')
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @include('klaravel::_klara._parts._scripts')
    @stack('scripts')
</body>
</html>
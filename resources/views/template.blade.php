<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CRUD de Usuários</title>

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
  </head>
  <body>
    <div id="app" class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ url('js/app.js') }}"></script>
  </body>
</html>

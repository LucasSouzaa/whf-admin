<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Área Restrita</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <div class="container">

            <h2 class="form-signin-heading">Área Restrita</h2>

            <div class="row">
                <div class="col-sm-2 text-right">
                    <img src="{{ $usuario->foto }}" alt="{{ $usuario->nome }}"
                    class="img-fluid">
                    <a href="{{ url()->route('logout') }}">
                        Sair
                        <i class="fa fa-sign-out"></i>
                    </a>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <label class="control-label">Nome:</label>
                        <p class="form-control">{{ $usuario->nome }}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email:</label>
                        <p class="form-control">{{ $usuario->email }}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Data de Nascimento:</label>
                        <p class="form-control">{{ $usuario->nascimento }}</p>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

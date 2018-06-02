<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Acesso Restrito</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::open(['class' => 'form-signin', 'url' => 'auth']) }}

            <h2 class="form-signin-heading">Acesso Restrito</h2>

            {{ Form::label('email', 'Email', ['class' => 'sr-only']) }}
            {{ Form::email('email', null, [
                'class' => 'form-control',
                'placeholder' => 'Email',
                'autofocus' => true,
                'required' => true])
            }}
            {{ Form::label('password', 'Senha', ['class' => 'sr-only']) }}
            {{ Form::password('password', [
                'class' => 'form-control',
                'placeholder' => 'Senha',
                'minlength' => '6',
                'required' => true])
            }}

            {{ Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) }}

            {{ Form::close() }}

        </div>
    </body>
</html>

@extends('template')

@section('content')
    @isset ($usuario)

    <h1>Editar Usuário</h1>

    {{ Form::model($usuario, [
        'data-toggle' => 'validator',
        'role' => 'form',
        'route' => ['usuarios.update', $usuario->id],
        'method' => 'put'])
    }}
    @else

    <h1>Cadastrar Usuário</h1>

    {{ Form::open([
        'data-toggle' => 'validator',
        'role' => 'form',
        'route' => 'usuarios.store'])
    }}
    @endisset

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
      {{ Form::label('nome', 'Nome') }}
      {{ Form::text('nome', null, ['class' => 'form-control', 'required' => true]) }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      {{ Form::label('email', 'Email') }}
      {{ Form::email('email', null, ['class' => 'form-control', 'required' => true]) }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      {{ Form::label('nascimento', 'Data de Nascimento') }}
      {{ Form::text('nascimento', null, ['class' => 'form-control', 'required' => true]) }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      {{ Form::label('cpf', 'CPF') }}
      {{ Form::text('cpf', null, [
          'class' => 'form-control',
          'required' => true,
          'data-remote' => config('urls.api') . 'api/validaCpf',
          'data-remote-error' => 'CPF inválido'])
      }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      {{ Form::label('senha', 'Senha') }}
      {{ Form::password('senha', [
          'class' => 'form-control',
          'required' => true,
          'data-minlength' => '6',
          'data-error' => 'A senha deve conter no mínimo 6 dígitos'])
      }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      {{ Form::label('senha_confirmation', 'Confirme a Senha') }}
      {{ Form::password('senha_confirmation', [
          'class' => 'form-control',
          'required' => true,
          'data-match' => '#senha',
          'data-match-error' => 'As senhas não são iguais'])
      }}
      <div class="help-block with-errors"></div>
    </div>

    <div class="form-group upload">
        <upload-component url="{{ config('urls.api') . 'api/upload' }}"></upload-component>
    </div>

    <div class="form-group">
        {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop

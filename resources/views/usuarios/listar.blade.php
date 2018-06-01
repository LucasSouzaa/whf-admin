@extends('template')

@section('content')
  <div class="row">
    <a class="btn btn-primary" href="{{ url('usuarios/create') }}" role="button">
      Novo Usuário
    </a>
  </div>
  <div class="row">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Email</th>
          <th>CPF</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
          <td>
            <img src="{{ $usuario->foto }}" alt="{{ $usuario->nome }}">
          </td>
          <td>{{ $usuario->nome }}</td>
          <td>{{ $usuario->email }}</td>
          <td>{{ $usuario->cpf }}</td>
          <td>
            <div class="acoes">
              <a href="{{ url("usuarios/{$usuario->id}/edit") }}" class="pull-left"
              title="Editar Usuário">
                <i class="fa fa-pencil fa-fw"></i>
              </a>
              <label class="switch pull-left" title="Alterar Status">
                <input type="checkbox" value="{{ $usuario->id }}"
                {{ $usuario->status === 'a' ? 'checked' : '' }}>
                <span class="slider round"></span>
              </label>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Email</th>
          <th>CPF</th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
@stop

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
              <label class="switch pull-left" title="Alterar Status">
                <input type="checkbox" value="{{ $usuario->id }}"
                {{ $usuario->status === 'a' ? 'checked' : '' }}>
                <span class="slider round"></span>
              </label>
              <a href="{{ url("usuarios/{$usuario->id}/edit") }}" class="pull-left"
              title="Editar Usuário">
                <i class="fa fa-pencil fa-fw"></i>
              </a>
              <a href="#" class="pull-left excluir" data-id="{{ $usuario->id }}"
              title="Excluir Usuário">
                <i class="fa fa-times fa-fw"></i>
              </a>
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

    <div class="modal fade" id="modal" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja excluir o usuário?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
            <button type="button" class="btn btn-primary" id="confirma" data-id="">Sim</button>
          </div>
        </div>
      </div>
    </div>

  </div>
@stop

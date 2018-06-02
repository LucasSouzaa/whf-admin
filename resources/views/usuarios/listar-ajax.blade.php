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

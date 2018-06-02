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

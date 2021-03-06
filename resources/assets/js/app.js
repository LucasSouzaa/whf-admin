
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('bootstrap-validator');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//

Vue.component('upload-component', require('./components/Upload.vue'));

var app = new Vue({
    el: '#app'
});


$(function() {
    var baseUrl = $('#baseUrl').val();

    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#nascimento').mask('00/00/0000');

    $('table').DataTable({
      'aaSorting': [],
      'columns': [
        {'orderable': false },
        null,
        null,
        null,
        {'orderable': false }
      ],
      'bLengthChange': false,
      'pageLength': 5,
      'language': {
          'zeroRecords': 'Nenhum resultado encontrado!',
          'info': 'Página _PAGE_ de _PAGES_',
          'infoEmpty': 'Nenhum registro disponível',
          'infoFiltered': '(filtrado de _MAX_ registros)',
          'loadingRecords': 'Carregando...',
          'processing': 'Processando...',
          'search': 'Busca:',
          'paginate': {
            'first': 'Primeiro',
            'last': 'Último',
            'next': 'Próximo',
            'previous': 'Anterior'
          },
      },
      'processing': true,
      'serverSide': true,
      'ajax': {
          'url': baseUrl + '/usuarios',
          'dataType': 'json'
      }
    });

    var modal = $('#modal');

    $(document).on('click', '.excluir', function (e) {
        e.preventDefault();

        modal.modal('toggle');
        $('#confirma').data('id', $(this).data('id'));
    });

    $('#confirma').click(function () {
        axios.delete(baseUrl + '/usuarios/' + $(this).data('id'));
        location.reload();
    });

    $(document).on('change', 'input[type="checkbox"]', function () {
        var id = $(this).val();
        var status = $(this).is(':checked') ? 'a' : 'i';

        axios.post(baseUrl + '/usuarios/updateStatus', {
            id: id,
            status: status
        });
    });
});

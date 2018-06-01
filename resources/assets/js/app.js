
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


$(function() {
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
      }
    });
});

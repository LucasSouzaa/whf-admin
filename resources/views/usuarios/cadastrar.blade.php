@extends('template')

@section('content')
    <h1>Cadastrar Usuário</h1>
    <div id="fileUpload">
        <input type="file" @change="arquivoSelecionado" class="d-none" ref="fileInput">
        <button @click="$refs.fileInput.click()">Selecionar Foto</button>
        <div id="preview" style="width: 100px; height:100px; background-color: #ccc">
            <i class="fa fa-circle-o-notch fa-spin d-none" style="font-size:24px"></i>
            <img src="" class="img-fluid">
        </div>
    </div>

    <script>
        var fileUpload = new Vue({
            el: '#fileUpload',
            data () {
                return {
                    arquivo: null
                }
            },
            methods: {
                arquivoSelecionado(e) {
                    this.arquivo = e.target.files[0];

                    var fd = new FormData();
                    fd.append('foto', this.arquivo, this.arquivo.name);

                    var loading = $('.fa-spin');
                    loading.removeClass('d-none');

                    var img = $('#preview img');
                    img.attr('src', '');

                    axios.post('http://marcelodewes.ml/whf-api/api/upload', fd)
                        .then(function(res) {
                            img.attr('src', res.data.foto);
                            loading.addClass('d-none');
                        }).catch(function() {
                            loading.addClass('d-none');
                        });
                }
            }
        });
    </script>
@stop

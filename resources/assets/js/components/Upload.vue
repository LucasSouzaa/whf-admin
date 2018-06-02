<template>
    <div>
        <label for="file">Foto</label>
        <input name="foto" type="hidden">
        <div id="fileUpload">
            <div id="preview" class="pull-left" @click="$refs.fileInput.click()">
                <i class="fa fa-circle-o-notch fa-spin d-none"></i>
                <img src="" class="img-fluid">
            </div>
            <input required="required" name="file" type="file" id="file" class="pull-left"
            @change="arquivoSelecionado" ref="fileInput">
            <div class="help-block with-errors"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                arquivo: null
            }
        },
        props: ['preview', 'url'],
        mounted: function () {
            this.trocaImagem(this.preview);
        },
        methods: {
            arquivoSelecionado(e) {
                this.arquivo = e.target.files[0];

                var fd = new FormData();
                fd.append('foto', this.arquivo, this.arquivo.name);

                var loading = $('.fa-spin');
                loading.removeClass('d-none');

                var self = this;
                self.trocaImagem('');

                axios.post(this.url, fd)
                    .then(function(res) {
                        self.trocaImagem(res.data.foto);
                        loading.addClass('d-none');
                    }).catch(function() {
                        loading.addClass('d-none');
                    });
            },
            trocaImagem(src) {
                $('#preview img').attr('src', src);
                $('input[name="foto"]').val(src);
            }
        }
    }
</script>

<style scoped>
    #preview {
        background-color: #ccc;
        height:100px;
        position: relative;
        width: 100px;
    }

    #file {
        margin-left: 10px;
        margin-top: 30px;
    }

    i {
        font-size: 24px;
        left: 50%;
        margin-top: -14px;
        margin-left: -12px;
        position: absolute;
        top: 50%;
    }
</style>

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
        props: ['url'],
        methods: {
            arquivoSelecionado(e) {
                this.arquivo = e.target.files[0];

                var fd = new FormData();
                fd.append('foto', this.arquivo, this.arquivo.name);

                var loading = $('.fa-spin');
                loading.removeClass('d-none');

                var img = $('#preview img');
                img.attr('src', '');

                axios.post(this.url, fd)
                    .then(function(res) {
                        var foto = res.data.foto;

                        $('input[name="foto"]').val(foto);
                        img.attr('src', foto);
                        loading.addClass('d-none');
                    }).catch(function() {
                        loading.addClass('d-none');
                    });
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

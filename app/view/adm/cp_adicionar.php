<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fa fa-plus text-primary"></i> Adicionar Curso Presencial</h1>
            <p class="mt-4">Os campos que tiverem * são de preenchimento obrigatório.</p>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10 col-lg-8">


            <form id="formAdicionar">


                <div class="form-row">

                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                        <label class="" for="inputNomeCurso">Nome do Curso</label>
                        <input type="text" class="form-control" name="inputNomeCurso" placeholder="Ex: Curso de Atendimento ao Público" required>

                    </div>

                </div>



                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputTotal">Total de horas</label>
                        <input type="text" class="form-control" name="inputTotal" required>

                    </div>

                </div>

                <div class="form-row mt-3">

                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                        <label class="control-label">Descrição</label>
                        <textarea class="form-control" name="txt_descricao" rows="6" maxlength="500" placeholder="Descreva o conteúdo. Máximo 500 carecteres."></textarea>

                    </div>

                </div>

                <div class="form-row ml-1">

                    <div class="form-group ">

                        <button type="submit" class="btn btn-success">Adicionar</button>

                    </div>

                </div>

            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $("#formAdicionar").submit(function(event){
            $.ajax({
                type: "POST",
                url: "<?=BASE_URL?>Curso/adicionar_curso",
                data: $("#formAdicionar").serialize(),
                success: function(data){

                    if($.trim(data) == true){

                        $('#formAdicionar').trigger("reset");

                        swal("OK!","Curso adicionado com sucesso!", "success" ,{ timer: 3000, button: false});
                        //Depois de 3,5 segundos, o usuário será redirecionado
                         setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/cp_cursos'; }, 3100); 
                    }else{
                        swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                    }

                },
                beforeSend: function(){
                    swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
                },
                error: function() {
                    alert('Unexpected error.');
                }
            });//AJAX
            return false;
        });
    }); 
</script>

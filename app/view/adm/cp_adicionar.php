<script type="text/javascript">
    
     $(document).ready(function(){
   
      $('#inputHorario').mask('00:00');

    });
</script>
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

                        <label class="" for="inputInicio">Início</label>
                        <input type="date" class="form-control" name="inputInicio" required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputHorario">Horário do Curso</label>
                        <input type="text" class="form-control" name="inputHorario" id="inputHorario" required>

                    </div>

                </div>

                <label class="">Dias de curso:</label><br>
                <div class="form-row">
                     <div class="form-check">
                        <div class="col-4 col-lg-4">
                            <input type="checkbox" class="form-check-input" id="check1" name="dias[]" value="SEG">
                            <label class="form-check-label" for="check1">Segunda</label>
                            <input type="checkbox" class="form-check-input " id="check2" name="dias[]" value="TER">
                            <label class="form-check-label" for="check2">Terça</label>
                        </div>
                        <div  class="col-4 col-lg-4">
                            <input type="checkbox" class="form-check-input" id="check3" name="dias[]" value="QUA">
                            <label class="form-check-label" for="check3">Quarta</label>
                            <input type="checkbox" class="form-check-input " id="check4" name="dias[]" value="QUI">
                            <label class="form-check-label " for="check4">Quinta</label>
                        </div>
                        <div class="col-4 col-lg-4">
                             <input type="checkbox" class="form-check-input" id="check5" name="dias[]" value="SEX">
                            <label class="form-check-label" for="check5">Sexta</label>
                            <input type="checkbox" class="form-check-input" id="check6" name="dias[]" value="SAB">
                            <label class="form-check-label" for="check6">Sábado</label>
                        </div>
                      </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputFim">Fim</label>
                        <input type="date" class="form-control" name="inputFim" required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputTotal">Total de horas</label>
                        <input type="text" class="form-control" name="inputTotal" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="aulas">Quantidade de Aulas</label>
                        <input type="number" class="form-control" id="aulas" name="inputQuantidade" required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="aulas">Limitar Inscritos</label>
                        <input type="number" class="form-control" id="aulas" name="inputLimitacao" required>

                    </div>

                </div>

                <div class="mt-3">
                    <label>O curso será</label>

                    <div class="form-row ml-1">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="radio_curso" value="S" checked>Somente para servidores
                            </label>
                        </div>


                    </div>

                    <div class="form-row ml-1">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="radio_curso" value="A">Aberto ao público
                            </label>
                        </div>
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

                        swal("OK!","Cadastro realizado com sucesso!", "success" ,{ timer: 3000, button: false});
                        //Depois de 3,5 segundos, o usuário será redirecionado
                         setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/cp_editar'; }, 3100); 
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

<script type="text/javascript">
    
     $(document).ready(function(){
   
      $('#inputHorario').mask('00:00');

    });
</script>

<div class="container">
    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="far fa-edit text-primary"></i> Editar Curso Presencial</h1>
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
                        <input type="text" class="form-control" name="inputNomeCurso" id="inputNomeCurso" placeholder="Ex: Curso de Atendimento ao Público" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputInicio">Início</label>
                        <input type="date" class="form-control" name="inputInicio" id="inputInicio"required>

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

                <div class="form-row mt-2">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputFim">Fim</label>
                        <input type="date" class="form-control" name="inputFim" id="inputFim" required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputTotal">Total de horas</label>
                        <input type="text" class="form-control" name="inputTotal" id="inputTotal" required>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="aulas">Quantidade de Aulas</label>
                        <input type="number" class="form-control" id="inputQuantidade" name="inputQuantidade" required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="aulas">Limitar Inscritos</label>
                        <input type="number" class="form-control" id="inputLimitacao" name="inputLimitacao" required>

                    </div>

                </div>

                <div class="mt-3">
                    <label>O curso será</label>

                    <div class="form-row ml-1">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="radio_curso" value="S" id="radio1">Somente para servidores
                            </label>
                        </div>


                    </div>

                    <div class="form-row ml-1">

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="radio_curso" value="A" id="radio2">Aberto ao público
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">

                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                        <label class="control-label">Descrição</label>
                        <textarea class="form-control" name="txt_descricao" id="txt_descricao" rows="6" maxlength="500" placeholder="Descreva o conteúdo. Máximo 500 carecteres."></textarea>

                    </div>

                </div>

                <div class="form-row ml-1">

                    <div class="form-group ">

                        <button type="submit" class="btn btn-success">Editar</button>

                    </div>

                </div>

            </form>

        </div>
    </div>

    <div class="row justify-content-center mt-3">

        <div class="col-lg-10">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Instrutor</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>Jair Bolsonaro</td>
                        <td><button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                    </tr>
                    <tr>

                        <td>Fernando Haddad</td>
                        <td><button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>

                    </tr>

                </tbody>
            </table>


        </div>

        <div class="form-row ml-1">

            <div class="form-group ">

                <a type="submit" class="btn btn-success" href="#" data-toggle="modal" data-target="#modalInstrutor">Adicionar Instrutor</a>

            </div>

        </div>

    </div>
</div> <!-- container -->

<!-- ### MODAL #### -->

<div class="modal fade" id="modalInstrutor" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Adicionar Instrutor</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="form-group">

                        <div class="btn-group btn-group-toggle" data-toggle="buttons">


                            <label class="btn btn-success active">
                                <input type="radio" name="nservidor" value="servidor" id="servidor" autocomplete="off"> Servidores
                            </label>

                            <label class="btn btn-success">
                                <input type="radio" name="servidor" value="externo" id="externo" autocomplete="off"> Externos
                            </label>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div id="instrutor"></div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Fechar
                </button>
            </div>

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

        var codigo = "<?php echo $_SESSION['curso']?>";
        carregar_dados(codigo);

         $('#instrutor').load("<?=BASE_URL?>Adm/table/add_instrutorservidor");

    });

    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário

    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "servidor") {

            $('#instrutor').load("<?=BASE_URL?>Adm/table/add_instrutorservidor");

        } else if (opcao == "externo") {

            $('#instrutor').load("<?=BASE_URL?>Adm/table/add_instrutorexterno");

        }
    });


    function carregar_dados(codigo){
     
        $.ajax({
            type: 'POST',
            url: '<?=BASE_URL?>Curso/listar_curso',
            dataType: "json",
            data: {'codigo': codigo},
            success: function(data){
                swal.close();
               //Carrega os dados nos campos
                $('#inputNomeCurso').val(data[0].nome);
                $('#inputInicio').val(data[0].inicio);
                $('#inputHorario').val(data[0].horario);
                $('#inputFim').val(data[0].fim);
                $('#inputQuantidade').val(data[0].quant_aulas);
                $('#inputLimitacao').val(data[0].limite_inscritos);
                $('#txt_descricao').val(data[0].descricao);
                
                if(data[0].categoria === 'S'){
                    $('#radio1').attr('checked', true);
                }else{
                    $('#radio2').attr('checked', true);
                }

                //O ajax abaixo irá buscar e carregar na tela os dias da semana
                $.ajax({
                    type:'POST',
                    url: '<?=BASE_URL?>Curso/listar_dias',
                    dataType: "json",
                    data:{'codigo' : codigo},
                    success: function(data){
                        
                        var total_array = data.length;
                       
                        for (var i = 0; i <= total_array ; i++) {
                            //O for abaixo vai testar o valor de todos os checkbox, e ve se corresponde com o valor que veio do banco
                            for (var a = 1; a <= 7; a++) {

                                if($('#check' + a).val() === data[i].dias){
                                    $('#check' + a).attr('checked', true);
                                }
                            }
                        }
                    },error : function(){
                        alert('Unexpected error.');
                    }
                });


            }, beforeSend: function(){
                swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
            }, error : function(){
                alert('Unexpected error.');
            }
        });
       }//carregar dados

</script>

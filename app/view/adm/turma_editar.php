<script type="text/javascript">
    
     $(document).ready(function(){
   
      $('#inputHorario').mask('00:00');

    });
</script>

<div class="container">
    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="far fa-edit text-primary"></i> Editar Turma</h1>
            <p class="mt-4">Os campos que tiverem * são de preenchimento obrigatório.</p>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10 col-lg-8">


            <form id="formAdicionar">

                <div class="form-row">
                    
                     <div class="form-group col-md-3 col-sm-3 col-12 col-lg-3">

                        <label class="" for="inputNomeCurso">Código da Turma</label>
                        <input type="text" class="form-control" name="inputCodTurma" id="inputCodTurma" readonly>

                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group col-md-9 col-sm-9 col-12 col-lg-9">

                        <label class="" for="inputNomeCurso">Nome do Curso</label>
                        <input type="text" class="form-control" name="inputNomeCurso" id="inputNomeCurso" readonly>

                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-12 col-lg-3">

                        <label class="" for="inputNomeCurso">Código do Curso</label>
                        <input type="text" class="form-control" name="inputCodCurso" id="inputCodCurso" readonly>

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputInicio">Início</label>
                        <input type="date" class="form-control" name="inputInicio" id="inputInicio"required>

                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                        <label class="" for="inputFim">Fim</label>
                        <input type="date" class="form-control" name="inputFim" id="inputFim" required>

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

                        <label class="" for="inputHorario">Horário do Curso</label>
                        <input type="text" class="form-control" name="inputHorario" id="inputHorario" required>

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

                <div class="form-row ml-1 mt-3">

                    <div class="form-group ">

                        <button type="submit" class="btn btn-success">Editar</button>

                    </div>

                </div>

            </form>

        </div>
    </div>

     <div class="row">

        <div class="col-12 text-center mt-5">

            <h3 class="display-4">Instrutores</h3>

            <div class="form-group mt-3">

                <div class="btn-group" role="group">
               
                    <button type="button" class="btn btn-success" autocomplete="off" onclick="adicionar_servidor($('#inputCodTurma').val())"><i class="fas fa-plus"></i> Servidor</button>
            
                    <button type="button" class="btn btn-success" autocomplete="off" onclick="adicionar_externo($('#inputCodTurma').val())"><i class="fas fa-plus"></i> Externo</button>

                </div>

            </div>
            <hr>
        </div>

    </div>

    <div class="row justify-content-center mt-3">

        <div class="col-lg-12 table-responsive">

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Instrutor Servidor</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody id="tabela_servidor">

                </tbody>
            </table>

        </div>

        <hr>

         <div class="col-lg-12 table-responsive mt-5">

            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Instrutor Externo</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody id="tabela_externo">

                </tbody>
            </table>


        </div>

    </div>
</div> <!-- container -->

<!-- ### MODAL #### -->

<div class="modal fade" id="modalServidor" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info text-light">

                <h5 class="modal-title">Adicionar Instrutor Servidor</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="table-responsive col-lg-12">

                        <form id="formAddInstrutor">
                            <input type="hidden" name="inputModalTurma" id="inputModalTurma">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Adicionar</th>

                                    </tr>
                                </thead>
                                <tbody id="table_servidor">
                                </tbody>
                            </table>

                            <div class="row float-right mr-3">
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>

                        </form>

                    </div>  

                </div>

                <div class="col-lg-12">

                    <div id="instrutor"></div>

                </div>

            </div>

        </div>
    </div>

</div> <!-- modal servidor-->


<div class="modal fade" id="modalExterno" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info text-light">

                <h5 class="modal-title">Adicionar Instrutor Externo</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="table-responsive col-lg-12">

                        <form id="formAddExterno">
                            <input type="hidden" name="inputModalTurmaExt" id="inputModalTurmaExt">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Adicionar</th>

                                    </tr>
                                </thead>
                                <tbody id="table_externo">
                                </tbody>
                            </table>

                            <div class="row float-right mr-3">
                                <button type="submit" class="btn btn-success">Adicionar</button>
                            </div>

                        </form>

                    </div>  

                </div>

                <div class="col-lg-12">

                    <div id="instrutor"></div>

                </div>

            </div>

        </div>
    </div>

</div> <!-- modal externo-->

<script>
    $(document).ready(function() {
        //Pega o id do curso e carrega suas informações na tela
        var codigo = <?php echo $_GET['turma']?>;
        carregar_dados(codigo);
        tabela_servidor(codigo);

                //Adiciona instrutor
        $('#formAddInstrutor').submit(function(event){
          $.ajax({
            dataType:'json',
            type: 'POST',
            url:'<?=BASE_URL?>Turma/adicionar_instrutor_ser',
            data: $('#formAddInstrutor').serialize(),
            success: function(data){
              
               if(data[0] == true){

                   // $('#formAddInstrutor').trigger("reset");

                    swal("OK!","Instrutor(s) adicionado(s) com sucesso!", "success" ,{ timer: 3000, button: false});
                    //Depois de 3,5 segundos, o usuário será redirecionado
                    setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/turma_editar/?turma=' + data[1] ; }, 3100);
                }else{
                    swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                }

            }, beforeSend: function() {
                            swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },error: function() {
              alert('Unexpected error.');
            }
          });
          return false;
        });//submit


                   //Adiciona instrutor externo
        $('#formAddExterno').submit(function(event){
          $.ajax({
            dataType:'json',
            type: 'POST',
            url:'<?=BASE_URL?>Turma/adicionar_instrutor_ext',
            data: $('#formAddExterno').serialize(),
            success: function(data){
               
               if(data[0] == true){

                    swal("OK!","Instrutor(s) adicionado(s) com sucesso!", "success" ,{ timer: 3000, button: false});
                    //Depois de 3,5 segundos, o usuário será redirecionado
                    setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/turma_editar/?turma=' + data[1] ; }, 3100);
                }else{
                    swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                }

            }, beforeSend: function() {
                            swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },error: function() {
              alert('Unexpected error.');
            }
          });
          return false;
        });//submit

    });//document

    //    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário
    $("input[type=radio]").on("change", function() {

        var opcao = $(this).val();

        if (opcao == "servidor") {

            $('#instrutor').load("<?=BASE_URL?>Adm/table/add_instrutorservidor");

        } else if (opcao == "externo") {

            $('#instrutor').load("<?=BASE_URL?>Adm/table/add_instrutorexterno");

        }
    });


    //Carrega as informações da turma nos campos
    function carregar_dados(codigo){
     
        $.ajax({
            type: 'POST',
            url: '<?=BASE_URL?>Turma/carregar_turma',
            dataType: "json",
            data: {'codigo': codigo},
            success: function(data){
                swal.close();
               //Carrega os dados nos campos
                $('#inputCodTurma').val(data[0].cod_turma)
                $('#inputNomeCurso').val(data[0].nome);
                $('#inputCodCurso').val(data[0].cod_curso)
                $('#inputInicio').val(data[0].inicio);
                $('#inputHorario').val(data[0].horario);
                $('#inputFim').val(data[0].fim);
                $('#inputQuantidade').val(data[0].quantidade);
                $('#inputLimitacao').val(data[0].limite);
             
                if(data[0].categoria === 'S'){
                    $('#radio1').attr('checked', true);
                }else{
                    $('#radio2').attr('checked', true);
                }

                //O ajax abaixo irá buscar e carregar na tela os dias da semana
                $.ajax({
                    type:'POST',
                    url: '<?=BASE_URL?>Turma/listar_dias',
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

                             $('#inputHorario').val(data[i].horario);
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

       //Abre o modal adicionar_instrutor
       function adicionar_servidor(turma){
        
        $('#modalServidor').modal('show');
        table_servidores();
        $('#inputModalTurma').val(turma);
       
       }

       //Abre o modal adicionar_instrutor
       function adicionar_externo(turma){
  
        $('#modalExterno').modal('show');
        table_externo();
        $('#inputModalTurmaExt').val(turma);
       
       }

       //Lista os instrutores servidores para inserção
       function table_servidores(){
          $.ajax({
            type: 'POST',
            dataType:'json',
            url:'<?=BASE_URL?>Usuario/listar_usuarios',
            data: {'categoria' : 'S', 'tipo' : 'I'},
            success: function(data){
              swal.close();
              //Limpa a tabela, caso o modal já tenha sido aberto antes
               $('#table_servidor tr').remove();

              for(var i = 0; data.length > 0; i++){
                $('#table_servidor').append('<tr><td>' + data[i].nome + '</td><td>' 
                                                                 + '<input type="checkbox" class="form-check-input" name="instrutor[]" value="' + data[i].cpf +'"> '
                                                                 + '</td></tr>');
              }

            }, beforeSend: function() {
                                swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },error: function() {
                alert('Unexpected error.');
            }
          });
        }//table_servidores()

        //Lista os instrutores externos para inserção
        function table_externo(){
            $.ajax({
                dataType: 'json',
                url:'<?=BASE_URL?>Adm/listar_instrutor_ext',
                success: function(data){
                    swal.close();
                    //Limpa a tabela, caso o modal já tenha sido aberto antes
                     $('#table_externo tr').remove();

                    for(var i=0; data.length > 0; i++){
                        $('#table_externo').append('<tr><td>' + data[i].nome + '</td><td>' 
                                                                 + '<input type="checkbox" class="form-check-input" name="instrutor[]" value="' + data[i].cpf +'"> '
                                                                 + '</td></tr>');
                    }
                },beforeSend: function (){
                    swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
                },error: function(){
                    alert('Unexpected error.');
                }
            });
        }//table_externo()

        //Lista os instrutores servidores cadastrados na turma
        function tabela_servidor(turma){
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '<?=BASE_URL?>Turma/carrega_instrutor_ser',
                data: {'cod_turma' : turma},
                success: function(data){

                    for(var i=0; data.length > 0; i++){
                         $('#tabela_servidor').append('<tr><td>' + data[i].nome_servidor + '</td><td>' 
                                                                 + '<button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt" onclick="excluir_instrutor('+ turma + ')"></i></button> '
                                                                 + '</td></tr>');
                    }
                },beforeSend: function (){
                    swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
                },error: function(){
                    alert('Unexpected error.');
                }
            });
        }//tabela_servidor
//"'+  data[i].cpf_servidor +'",' + turma +'
    function excluir_instrutor(turma) {
        alert('Olá');
        // swal("Atenção", "Gostaria de excluir esse curso?", "warning", {
        //     buttons: {
        //         confirm: {
        //             text: "Sim",
        //             value: true,
        //             visible: true,
        //             className: "btn-confirm"
                    
        //         },
        //         cancel: {
        //             text: "Não",
        //             value: false,
        //             visible: true,
        //             className: "btn-cancel",
        //             closeModal: true,
        //         }
        //     },
        //     closeOnClickOutside: false
        // }).then((value) => {
        //     //Caso o valor seja verdadeiro, ele ira desativar o usuário
        //     if (value) {
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?=BASE_URL?>Turma/excluir_instrutor',
        //             data: {
        //                 'codigo': codigo
        //             },
        //             success: function(data) {
        //                 if (data === '1') {
        //                     swal("OK!", "Curso  excluido com sucesso!", "success", {timer: 3000,button: false});
        //                     //Depois de 3,1 segundos, o usuário será redirecionado
        //                     setTimeout(function() {
        //                         window.location.href = '<?=BASE_URL?>Adm/pagina/cp_cursos';
        //                     }, 3100);

        //                 } else {
        //                     swal("Atenção!", "Erro ao excluir cadastro. Entre em contato com suporte.", "error", {timer: 3000,button: false});
        //                 }
        //             },
        //             beforeSend: function() {
        //                 swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
        //             },
        //             error: function() {
        //                 alert('Unexpected error.');
        //             }

        //         }); //Ajax
        //     }
        // }); //swal

    } //excluir_instrutor()

</script>

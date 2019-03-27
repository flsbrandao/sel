<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody id="table_servidores">
     
    </tbody>
</table>

<!-- ### MODAL #### -->

<div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header  bg-info text-light">

                <h5 class="modal-title">Editar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form id="formEditarServ">
                            <div class="form-row">

                                <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                    <label>Matrícula</label>
                                    <input type="text" class="form-control" name="matricula" id="matricula" readonly>
                                     <input type="hidden"  name="inputCpf" id="inputCpf" readonly>

                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <select class="form-control" id="slc_categoria" name="slc_categoria">
                                        <option>Escolha uma opção</option>
                                        <option value="M">Munícipe</option>
                                        <option value="I">Instrutor</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group ">

                                    <button type="submit" class="btn btn-success">Editar</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
  
 $(document).ready(function() {

    table_servidores();

    $("#formEditarServ").submit(function(event){

        $.ajax({
            type:'POST',
            url: '<?=BASE_URL?>Usuario/alterar_servidor',
            data: $("#formEditarServ").serialize(),
            success: function(data){

                if($.trim(data) == true){
                    swal("OK!","Edição realizada com sucesso!", "success" ,{ timer: 3000, button: false});
                    //Depois de 3,1 segundos, o usuário será redirecionado
                    setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/estudantes'; }, 3100); 
                }else{
                    swal( "Atenção!", "Erro ao realizar edição. ", "error", { timer: 3000, button: false});
                }

            },beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },error: function() {
                alert('Unexpected error.');
            }
        });
        return false;
    });//submit

 });//document

function table_servidores(){
  $.ajax({
    type: 'POST',
    dataType:'json',
    url:'<?=BASE_URL?>Usuario/listar_usuarios',
    data: {'categoria' : 'S','tipo' : 'E'},
    success: function(data){
      swal.close();
      for(var i = 0; data.length > 0; i++){
        $('#table_servidores').append('<tr><td>' + data[i].nome + '</td><td>'
                                                 + data[i].matricula + '</td><td>'
                                                 + '<button type="submit" class="btn btn-success btn-sm" onclick=editar_servidor("' + data[i].cpf + '","' + data[i].matricula + '")><i class="fas fa-pencil-alt"></i></button>' + '</td></tr>');
      }

    }, beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
    },error: function() {
        alert('Unexpected error.');
    }
  });
}

function editar_servidor(cpf,matricula){

  $('#modalEdicao').modal('show');
  $('#matricula').val(matricula);
  $('#inputCpf').val(cpf);
}

</script>

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

            <div class="modal-header">

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
                                     <input type="hidden"  name="id_user" id="id_user" readonly>

                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="exampleFormControlSelect1">O usuário é:</label>
                                    <select class="form-control" id="slc_categoria" name="slc_categoria">
                                        <option value="M">Munícipe</option>
                                        <option value="S" selected>Servidor</option>
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


 });

function table_servidores(){
  $.ajax({
    type: 'POST',
    dataType:'json',
    url:'<?=BASE_URL?>Usuario/listar_usuarios',
    data: {'categoria' : 'S'},
    success: function(data){
      swal.close();
      for(var i = 0; data.length > 0; i++){
        $('#table_servidores').append('<tr><td>' + data[i].nome + '</td><td>'
                                                 + data[i].matricula + '</td><td>'
                                                 + '<button type="submit" class="btn btn-success btn-sm" onclick=editar_servidor(' + data[i].id + ',"' + data[i].matricula + '")><i class="fas fa-pencil-alt"></i></button>' + '</td></tr>');
      }

    }, beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
    },error: function() {
        alert('Unexpected error.');
    }
  });
}

function editar_servidor(id,matricula){

  $('#modalEdicao').modal('show');
  $('#matricula').val(matricula);
}

</script>

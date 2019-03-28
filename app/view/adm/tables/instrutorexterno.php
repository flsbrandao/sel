<button type="submit" class="btn btn-success mb-3" onclick="adicionar_instrutor()">Adicionar Instrutor</button>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody id="table_instrutor_ext">
           

        </tbody>
    </table>
</div>

<!-- ### MODAL #### -->

<div class="modal fade" id="modalInstrutor" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header  bg-info text-light">

                <h5 class="modal-title">Adicionar Instrutor</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">


                        <form id="formAddInstrutor">


                            <div class="form-row">

                                <div class="form-group col-md-6 col-sm-12 col-12 col-lg-6">

                                    <label class="" for="inputCpf">CPF</label>
                                    <input type="text" class="form-control" id="inputCpf" name="inputCpf" placeholder="123.456.789-0" required>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                    <label class="" for="txt_instrutor">Nome</label>
                                    <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="" required>

                                </div>

                            </div>


                            <div class="form-row">

                                <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                    <label class="control-label">Descrição</label>
                                    <textarea class="form-control" name="txt_descricao" id="txt_descricao" rows="6" maxlength="300" placeholder="Coloque uma breve descrição do instrutor. Máximo 300 carecteres."></textarea>

                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group ">

                                    <button type="submit" class="btn btn-success">Adicionar</button>

                                </div>

                            </div>

                        </form>

                    </div>

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

<script type="text/javascript">

$(document).ready(function(){

    $('#inputCpf').mask('000.000.000-00');
    listar_instrutor_ext();

    $("#formAddInstrutor").submit(function(event){
        $.ajax({
            type: 'POST',
            url: '<?=BASE_URL?>Adm/adicionar_instrutor_ext',
            data: $("#formAddInstrutor").serialize(),
            success: function(data){

                if($.trim(data) == '1'){

                    $('#formCadastro').trigger("reset");

                    swal("OK!","Instrutor inserido com sucesso!", "success" ,{ timer: 3000, button: false});
                    //Depois de 3,1 segundos, o usuário será redirecionado
                    setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/instrutores'; }, 3100); 

                }else{
                    swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                }

            },beforeSend: function (){

                swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
            },error: function(){
                alert('Unexpected error.');
            }
        });
        return false;
    });//submit
});//document
    
function adicionar_instrutor(){

    $("#modalInstrutor").modal('show');
}

function listar_instrutor_ext(){

    $.ajax({
        dataType: 'json',
        url:'<?=BASE_URL?>Adm/listar_instrutor_ext',
        success: function(data){
            swal.close();
            for(var i=0; data.length > 0; i++){
                $('#table_instrutor_ext').append('<tr><td>' + data[i].nome + '</td><td>' 
                                                         + '<button type="submit" class="btn btn-success btn-sm" onclick=editar_instrutor_ext("' + data[i].cpf + '")><i class="fas fa-pencil-alt"></i></button>' + '</td><td>' 
                                                         + '<button type="submit" class="btn btn-danger btn-sm" onclick=desativa_instrutor_ext("' + data[i].cpf + '")><i class="fas fa-trash-alt"></i></button>' + '</td></tr>' );
            }
        },beforeSend: function (){
            swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
        },error: function(){
            alert('Unexpected error.');
        }
    });
}//listar_instrutor_ext

function desativa_instrutor_ext(cpf) {

        swal("Atenção", "Gostaria de excluir esse instrutor?", "warning", {
            buttons: {
                confirm: {
                    text: "Sim",
                    value: true,
                    visible: true,
                    className: "btn-confirm"
                    
                },
                cancel: {
                    text: "Não",
                    value: false,
                    visible: true,
                    className: "btn-cancel",
                    closeModal: true,
                }
            },
            closeOnClickOutside: false
        }).then((value) => {
            //Caso o valor seja verdadeiro, ele ira desativar o usuário
            if (value) {
                $.ajax({
                    type: 'POST',
                    url: '<?=BASE_URL?>Adm/desativa_instrutor_ext',
                    data: {
                        'cpf': cpf
                    },
                    success: function(data) {
                        if (data === '1') {
                            swal("OK!", "Instrutor excluido com sucesso!", "success", {timer: 3000,button: false});
                            //Depois de 3,1 segundos, o usuário será redirecionado
                            setTimeout(function() {
                                window.location.href = '<?=BASE_URL?>Adm/pagina/instrutores';
                            }, 3100);

                        } else {
                            swal("Atenção!", "Erro ao excluir instrutor. Entre em contato com suporte.", "error", {timer: 3000,button: false});
                        }
                    },
                    beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
                    },
                    error: function() {
                        alert('Unexpected error.');
                    }

                }); //Ajax
            }
        }); //swal

    } //desativa_instrutor_ext()

</script>

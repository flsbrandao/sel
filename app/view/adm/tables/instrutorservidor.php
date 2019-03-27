<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody id="table_instrutores">

    </tbody>
</table>

<script>

$(document).ready(function(){

table_instrutores();

});//document

function table_instrutores(){
  $.ajax({
    type: 'POST',
    dataType:'json',
    url:'<?=BASE_URL?>Usuario/listar_usuarios',
    data: {'categoria' : 'S', 'tipo' : 'I'},
    success: function(data){
      swal.close();
      for(var i = 0; data.length > 0; i++){
        $('#table_instrutores').append('<tr><td>' + data[i].nome + '</td><td>'
                                                 + data[i].matricula + '</td><td>'
                                                 + '<button type="submit" class="btn btn-danger btn-sm" onclick=excluir_instrutor("' + data[i].cpf + '")><i class="fas fa-trash-alt"></i></button>' + '</td></tr>');
      }

    }, beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
    },error: function() {
        alert('Unexpected error.');
    }
  });
}//table_instrutores()

 function excluir_instrutor(cpf) {

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
                    url: '<?=BASE_URL?>Usuario/desativar_instrutor',
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

    } //exclui_instrutor()
</script>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Cód Turma</th>
                <th scope="col">Curso</th>
                <th scope="col">Data de Ínicio</th>
                <th scope="col">Data de Término</th>
                <th scope="col">Info</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody id="turma_aberta">
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){

    table_turma_aberta();
});

function table_turma_aberta(){

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '<?=BASE_URL?>Turma/listar_turmas',
        data: {'situacao' : 'AB'},
        success: function(data){
            swal.close();
            var inicio;
            var fim;
            for(var i=0; data.length > i; i++){
                inicio = data[i].inicio;
                fim = data[i].fim;

                $('#turma_aberta').append('<tr><td>' + data[i].codigo + '</td><td>'
                                                     + data[i].nome + '</td><td>' 
                                                     + inicio.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1') + '</td><td>'
                                                     + fim.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1') + '</td><td>' 
                                                     + '<button type="submit" class="btn btn-primary btn-sm"  onclick=busca_turma(' + data[i].codigo + ')><i class="fas fa-bars"></i></button></td><td>' 
                                                     + '<button type="submit" class="btn btn-success btn-sm" onclick=editar_turma(' + data[i].codigo + ')><i class="fas fa-pencil-alt"></i></button></td><td>'
                                                     + '<button type="submit" class="btn btn-danger btn-sm" onclick=desativa_turma(' + data[i].codigo + ')><i class="fas fa-trash-alt"></i></button>' + '</td></tr>');
            }

        },beforeSend: function() {
            swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
        },error: function() {
          alert('Unexpected error.');
        }
    });
}//table_turma_aberta()

function editar_turma(cod_turma){

     window.location.href = '<?=BASE_URL?>Adm/pagina/turma_editar/?turma=' + cod_turma;
}

function desativa_turma(cod_turma){
      swal("Atenção", "Gostaria de excluir essa turma?", "warning", {
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
                    url: '<?=BASE_URL?>Turma/desativar_turma',
                    data: {
                        'codigo': cod_turma
                    },
                    success: function(data) {
                        if (data === '1') {
                            swal("OK!", "Turma  excluida com sucesso!", "success", {timer: 3000,button: false});
                            //Depois de 3,1 segundos, o usuário será redirecionado
                            setTimeout(function() {
                                window.location.href = '<?=BASE_URL?>Adm/pagina/turmas';
                            }, 3100);

                        } else {
                            swal("Atenção!", "Erro ao excluir turma. Entre em contato com suporte.", "error", {timer: 3000,button: false});
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

}//desativa_turma

function busca_turma(cod_turma){
    swal("Atenção!", "Módulo em desenvolvimento", "warning");
}
</script>
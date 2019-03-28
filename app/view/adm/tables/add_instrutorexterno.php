<form id="formAddInstrutorExt">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Adicionar</th>

            </tr>
        </thead>
        <tbody id="table_instrutor_ext">
        </tbody>
    </table>
</form>
<div class="row float-right mr-3">
    <button type="submit" class="btn btn-success">Adicionar</button>
</div>

<script type="text/javascript">

$(document).ready(function(){
    listar_instrutor_ext();
});
    
function listar_instrutor_ext(){

    $.ajax({
        dataType: 'json',
        url:'<?=BASE_URL?>Adm/listar_instrutor_ext',
        success: function(data){
            swal.close();
            for(var i=0; data.length > 0; i++){
                $('#table_instrutor_ext').append('<tr><td>' + data[i].nome + '</td><td>' 
                                                         + '<input type="checkbox" class="form-check-input" name="instrutor[]" value="' + data[i].cpf +'"> '
                                                         + '</td></tr>');
            }
        },beforeSend: function (){
            swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
        },error: function(){
            alert('Unexpected error.');
        }
    });
}//listar_instrutor_ext

</script>
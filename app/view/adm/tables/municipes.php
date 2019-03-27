<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nome</th>
         
        </tr>
    </thead>
    <tbody id="table_municipes">
        
    </tbody>
</table>
<script type="text/javascript">
    
$(document).ready(function() {

    table_municipes();
 });

function table_municipes(){
  $.ajax({
    type: 'POST',
    dataType:'json',
    url:'<?=BASE_URL?>Usuario/listar_usuarios',
    data: {'categoria' : 'M', 'tipo' : 'E'},
    success: function(data){
      swal.close();
      for(var i = 0; data.length > 0; i++){
        $('#table_municipes').append('<tr><td>' + data[i].nome + '</td><td></tr>');
      }

    }, beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
    },error: function() {
        alert('Unexpected error.');
    }
  });
}
</script>

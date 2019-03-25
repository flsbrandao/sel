<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fa fa-plus text-primary"></i> Cursos Presenciais</h1>
            <hr>
        </div>

    </div>



    <div class="col-lg-12">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Total de Horas</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>

                </tr>
            </thead>
            <tbody id="cursos">
               
            </tbody>
        </table>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {

       table_cursos();
       alert('budega');
    });

    function table_cursos(){
    	$.ajax({
    		dataType: 'json',
    		url: '<?=BASE_URL?>Curso/listar_allcursos',
    		success: function (data){
    			for(var i=0; data.length > i; i++){
    				$('#cursos').append('<tr><td>' + data[i].codigo);
    			}
    			

    		},beforeSend: function(){
    			swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
    		}error: function(){
    			alert('Unexpected error.');
    		}
    	});
    }

</script>

<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-5">Inscrição</h1>
            <hr>
        </div>

    </div> 

	<div class="row justify-content-center mb-3" id="titulo_curso"></div>

    <div class="row" id="turmas"></div> 

</div> <!-- container -->



<script type="text/javascript">

	$(document).ready(function() {
		var codigo_curso = <?php echo $_GET['curso']?>;
    	carregar_dados(codigo_curso);
    	nome_curso(codigo_curso)
	});

	function carregar_dados(codigo_curso){

		$.ajax({
			type: 'POST',
            url: '<?=BASE_URL?>Turma/listar_turmas_curso',
            dataType: "json",
            data: {'codigo': codigo_curso},
            success: function(data){
            	var inicio;
            	var fim;
	            for (var i = 0; data.length > i; i++){

	            	 inicio = data[i].inicio;
                 	 fim = data[i].fim;

	               $('#turmas').append('<div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">' +
	                                     '<div class="card md-5">' +
	                                        '<div class="card-header">' + 
	                                            '<h6 class="card-subtitle mb text-muted">Presencial</h6>'+
	                                        '</div>'+
	                                        
	                                       '<ul class="list-group list-group-flush">'+
	                                          '<li class="list-group-item">Data de Ínicio: ' + inicio.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1') + '</li>' + 
	                                          '<li class="list-group-item">Data de Término (previsão): ' + fim.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1') + '</li>' +       
	                                        '</ul>'+
	                                        '<div class="card-body">'+
	                                          '<button type="button" class="btn btn-primary" onclick="mais_info(' + data[i].codigo + ')">Mais informações</button>'+
	                                        '</div>'+       
	                                      '</div></div>');
	            }
	            swal.close();
            },beforeSend: function(){
                swal({title: "Aguarde!", text: "Carregando...", icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif", button: false});
            },error : function(){
                alert('Unexpected error.');
            }
		}); //ajax
	}//Carregar_dados 

	function nome_curso(codigo_curso){
		$.ajax({
			type: 'POST',
            url: '<?=BASE_URL?>Curso/listar_curso',
            dataType: "json",
            data: {'codigo': codigo_curso},
            success: function(data){
            	$("#titulo_curso").append('<h4>Curso: ' + data[0].nome + '  </h4>');
            },error : function(){
                alert('Unexpected error.');
            }
		});//ajax
	}//nome_curso()
</script>
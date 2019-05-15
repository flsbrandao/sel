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

<div class="modal fade" id="modalMaisInfo" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header  bg-info text-light">

                <h5 class="modal-title">Mais informações</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">

                        <div class="row">

                            <div class="form-group col-12 col-md-12 col-sm-12 col-lg-12">

		                      <label for="inputData">Código do Curso</label>
		                      <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" readonly>

		                    </div>

		                    <div class="form-group col-12 col-md-12 col-sm-12 col-lg-12">

		                      <label for="inputData">Data de Ínicio:</label>
		                      <input type="text" class="form-control" id="inputInicio" name="inputInicio" readonly>

		                    </div>

		                    <div class="form-group col-12 col-md-12 col-sm-12 col-lg-12">

		                      <label for="inputData">Data de Término:</label>
		                      <input type="text" class="form-control" id="inputTermino" name="inputTermino" readonly>

		                    </div>


		                    <label for="inputData">Dias da Semana:</label>

		                      <div class="form-check">
		                        <div class="col-4 col-lg-4">
		                            <input type="checkbox" class="form-check-input" id="check1" name="dias[]" value="SEG" disabled>
		                            <label class="form-check-label" for="check1">Segunda</label>
		                            <input type="checkbox" class="form-check-input " id="check2" name="dias[]" value="TER" disabled>
		                            <label class="form-check-label" for="check2">Terça</label>
		                        </div>
		                        <div  class="col-4 col-lg-4">
		                            <input type="checkbox" class="form-check-input" id="check3" name="dias[]" value="QUA" disabled>
		                            <label class="form-check-label" for="check3">Quarta</label>
		                            <input type="checkbox" class="form-check-input " id="check4" name="dias[]" value="QUI" disabled>
		                            <label class="form-check-label " for="check4">Quinta</label>
		                        </div>
		                        <div class="col-4 col-lg-4">
		                             <input type="checkbox" class="form-check-input" id="check5" name="dias[]" value="SEX" disabled>
		                            <label class="form-check-label" for="check5">Sexta</label>
		                            <input type="checkbox" class="form-check-input" id="check6" name="dias[]" value="SAB" disabled>
		                            <label class="form-check-label" for="check6">Sábado</label>
		                        </div>
		                      </div>

		                    <div class="form-group col-12 col-md-12 col-sm-12 col-lg-12">

		                      <label for="inputData">Horário:</label>
		                      <input type="text" class="form-control" id="inputHorario" name="inputHorario" readonly>

		                    </div>

		                     <div class="row float-right mr-3">
                                <button type="submit" class="btn btn-success">Inscrever-se</button>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>

</div> <!-- modalMaisInfo -->

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

	            	 codigo_turma = data[i].codigo;
	            	 inicio = data[i].inicio;
                 	 fim = data[i].fim;

                 	    //O ajax abaixo irá buscar e carregar na tela os dias da semana
		                $.ajax({
		                    type:'POST',
		                    url: '<?=BASE_URL?>Turma/listar_dias',
		                    dataType: "json",
		                    data:{'codigo' : codigo_turma},
		                    success: function(data){
		                       dias = data[i];
		                    },error : function(){
		                        alert('Unexpected error.');
		                    }
		                });

	               $('#turmas').append('<div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">' +
	                                     '<div class="card md-5">' +
	                                        '<div class="card-header">' + 
	                                            '<h6 class="card-subtitle mb text-muted">Presencial</h6>'+
	                                        '</div>'+
	                                        
	                                       '<ul class="list-group list-group-flush">'+
	                                       	  '<li class="list-group-item">Código da Turma: ' + data[i].codigo + '</li>'+
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

	function mais_info(codigo_turma){

		$('#modalMaisInfo').modal('show'); //exibe o modal
	}
</script>
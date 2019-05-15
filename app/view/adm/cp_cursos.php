<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-4"><i class="fas fa-chalkboard-teacher text-primary"></i> Cursos Presenciais</h1>
            <hr>
        </div>

    </div>



    <div class="col-lg-12">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
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

</div> <!-- container -->

<div class="modal fade" id="modalDescricao" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header  bg-info text-light">

                <h5 class="modal-title">Descrição do curso</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">

                        <div class="row">

                            <textarea rows="5" cols="70" id="desc" readonly class="form-control"></textarea>

                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>

</div> <!-- modalDescricao -->


<div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog">

    <div class="modal-dialog  modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info text-light">

                <h5 class="modal-title">Editar Curso</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row justify-content-center">

                    <div class="col-sm-12 col-md-10 col-lg-8">

                        <form id="formEditar">

                        	<input type="hidden" id="codigo" name="codigo">

                            <div class="form-row">

                                <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                    <label class="" for="inputNomeCurso">Nome do Curso</label>
                                    <input type="text" class="form-control" name="inputNomeCurso" id="inputNomeCurso" placeholder="Ex: Curso de Atendimento ao Público" required>

                                </div>

                            </div>



                            <div class="form-row">

                                <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                                    <label class="" for="inputTotal">Total de horas</label>
                                    <input type="text" class="form-control" name="inputTotal" id="inputTotal" required>

                                </div>

                            </div>

                            <div class="form-row mt-3">

                                <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                    <label class="control-label">Descrição</label>
                                    <textarea class="form-control" name="txt_descricao" id="txt_descricao" rows="6" maxlength="500" placeholder="Descreva o conteúdo. Máximo 500 carecteres."></textarea>

                                </div>

                            </div>

                            <div class="form-row ml-1">

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

</div> <!-- modalEditar -->

<script>
    $(document).ready(function() {

        table_cursos();

        $("#formEditar").submit(function(event){
        	$.ajax({
        		type: 'POST',
        		url:'<?=BASE_URL?>Curso/editar_curso',
        		data: $("#formEditar").serialize(),
        		success: function(data){

        			if($.trim(data) == true){

                        $('#formAdicionar').trigger("reset");

                        swal("OK!","Curso editado com sucesso!", "success" ,{ timer: 3000, button: false});
                        //Depois de 3,5 segundos, o usuário será redirecionado
                         setTimeout(function(){ window.location.href = '<?=BASE_URL?>Adm/pagina/cp_cursos'; }, 3100); 
                    }else{
                        swal( "Atenção!", "Erro ao realizar cadastro. Entre em contato com suporte.", "error", { timer: 3000, button: false});
                    }

        		},beforeSend: function() {
	                swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
	            },error: function() {
	                alert('Unexpected error.');
	            }
        	});

        	return false;
        });

    });

    function table_cursos() {
        $.ajax({
            dataType: 'json',
            url: '<?=BASE_URL?>Curso/listar_allcursos',
            success: function(data) {

                for (var i = 0; data.length > i; i++) {
                    $('#cursos').append('<tr><td>' + data[i].codigo + '</td><td>' 
                                                   + data[i].nome + '</td><td>' 
                                                   + data[i].total_horas + '</td><td>' 
                                                   +'<button type="submit" class="btn btn-primary btn-sm"  onclick=busca_descricao(' + data[i].codigo + ')><i class="fas fa-bars"></i></button>' + '</td><td>' 
                                                   +'<button type="submit" class="btn btn-success btn-sm" onclick=listar_curso(' + data[i].codigo + ')><i class="fas fa-pencil-alt"></i></button>' + '</td><td>' 
                                                   +'<button type="submit" class="btn btn-danger btn-sm" onclick=desativa_curso(' + data[i].codigo + ')><i class="fas fa-trash-alt"></i></button>' + '</td></tr>');
                }
                swal.close();

            },
            beforeSend: function() {
                swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },
            error: function() {
                alert('Unexpected error.');
            }
        });
    } //table_cursos()

    function busca_descricao(codigo) {

        $('#modalDescricao').modal('show'); //exibe o modal
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?=BASE_URL?>Curso/listar_curso',
            data: {
                'codigo': codigo
            },
            success: function(data) {

                swal.close();
                $('#desc').val(data[0].descricao);

            },
            beforeSend: function() {
                swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },
            error: function() {
                alert('Unexpected error.');
            }
        });
    } //busca_descricao()

    function desativa_curso(codigo) {

        swal("Atenção", "Gostaria de excluir esse curso?", "warning", {
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
                    url: '<?=BASE_URL?>Curso/desativar_curso',
                    data: {
                        'codigo': codigo
                    },
                    success: function(data) {
                        if (data === '1') {
                            swal("OK!", "Curso  excluido com sucesso!", "success", {timer: 3000,button: false});
                            //Depois de 3,1 segundos, o usuário será redirecionado
                            setTimeout(function() {
                                window.location.href = '<?=BASE_URL?>Adm/pagina/cp_cursos';
                            }, 3100);

                        } else {
                            swal("Atenção!", "Erro ao excluir cadastro. Entre em contato com suporte.", "error", {timer: 3000,button: false});
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

    } //desativa_curso()

    function listar_curso(codigo) {

        $('#modalEdicao').modal('show'); //exibe o modal
        $.ajax({
        	type: 'POST',
        	dataType: 'json',
        	url: '<?=BASE_URL?>Curso/listar_curso',
        	data: {'codigo' : codigo},
        	success: function(data){

        		$('#codigo').val(data[0].codigo);
        		$('#inputNomeCurso').val(data[0].nome);
        		$('#inputTotal').val(data[0].total_horas);
        		$('#txt_descricao').val(data[0].descricao);
        		swal.close();

        	}, beforeSend: function() {
                        swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
            },error: function() {
                        alert('Unexpected error.');
            }
        });
    } //editar_curso()

</script>

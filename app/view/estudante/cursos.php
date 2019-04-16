<div class="container">

    <div class="row">

        <div class="col-12 text-center mt-5">

            <h1 class="display-5">Cursos</h1>
            <hr>
        </div>

    </div>

    <div class="row mt-3" id="cursos"></div>
    
    
        

</div> <!-- container -->


<script type="text/javascript">
  
$(document).ready(function() {

    carrega_cursos();
});

 function carrega_cursos(){

    $.ajax({
        dataType: 'json',
        url: '<?=BASE_URL?>Curso/listar_allcursos',
        success: function(data){

            for (var i = 0; data.length > i; i++){
               $('#cursos').append('<div class="col-12 col-sm-6 col-md-6 col-lg-4 mt-3">' +
                                     '<div class="card md-5">' +
                                        '<div class="card-header">' + 
                                            '<h4 class="card-title">' + data[i].nome + '</h4> ' +
                                            '<h6 class="card-subtitle mb-2 text-muted">Presencial</h6>'+
                                        '</div>'+
                                        '<div class="card-body">'+
                                          '<p class="card-text text-justify">' + data[i].descricao + '</p>'+
                                        '</div>'+
                                       '<ul class="list-group list-group-flush">'+
                                          '<li class="list-group-item">Total de Horas: ' + data[i].total_horas + '</li>' +       
                                        '</ul>'+
                                        '<div class="card-body">'+
                                          '<button type="button" href="#" class="btn btn-success">Inscrever-se</button>'+
                                        '</div>'+       
                                      '</div></div>');
            }

            swal.close();

         }, beforeSend: function() {
              swal({title: "Aguarde!",text: "Carregando...",icon: "<?=BASE_URL?>app/view/assets/img/gif/preloader.gif",button: false});
          },
            error: function() {
                alert('Unexpected error.');
          }
    });

  }//carrega_cursos
</script>
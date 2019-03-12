<div class="container">

     <div class="row">
    
        <div class="col-12 text-center mt-5">
        
            <h1 class="display-4"><i class="fas fa-chalkboard-teacher text-primary"></i> Instrutores</h1> 
            <hr>
        </div>
         
    </div>
    
     <div class="row justify-content-center mt-3">
    
              <div class="form-group">

                       <div class="btn-group btn-group-toggle" data-toggle="buttons">
                           
                           
                          <label class="btn btn-success active">
                            <input type="radio" name="nservidor" value="servidor" autocomplete="off"> Servidores
                          </label>
                           
                          <label class="btn btn-success">
                            <input type="radio" name="servidor" value="externos" autocomplete="off"> Externos
                          </label>
                           
                        </div>
                    
                    </div>
         
        <div class="col-lg-12">
                <div id="instrutores"></div>
        </div>
  
    
    </div>
</div> <!-- container -->

        <script>

//    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário
    
      $("input[type=radio]").on("change", function() {
        
          var opcao = $(this).val();
            
            if (opcao == "servidor") {
                    
                      $('#instrutores').load("<?=BASE_URL?>Adm/table/instrutorservidor");

            } else if (opcao == "externos") {
              
                      $('#instrutores').load("<?=BASE_URL?>Adm/table/instrutorexterno");

            }
          });

    $(document).ready(function(){
        
        $('#instrutores').load("<?=BASE_URL?>Adm/table/instrutorservidor");
    });

</script>

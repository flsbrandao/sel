<div class="container">

     <div class="row">
    
        <div class="col-12 text-center mt-5">
        
            <h1 class="display-4"><i class="fas fa-user-graduate text-primary"></i> Estudantes</h1> 
            <hr>
        </div>
         
    </div>
    
     <div class="row justify-content-center mt-5">
                
                    <div class="form-group">

                       <div class="btn-group btn-group-toggle" data-toggle="buttons">
                           
                           
                          <label class="btn btn-success active">
                            <input type="radio" name="nservidor" value="servidor" id="nservidor" autocomplete="off"> Servidores
                          </label>
                           
                          <label class="btn btn-success">
                            <input type="radio" name="servidor" value="municipe" id="servidor" autocomplete="off"> Munícipes
                          </label>
                           
                        </div>
                    
                    </div>
                
        </div>
    
        <div class="col-lg-12">
    
            <div id="estudantes"></div>
    
        </div>
    
</div> <!-- container -->

   <!-- ### MODAL #### -->
      
     <div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog">
      
        <div class="modal-dialog  modal-lg" role="document">
         
            <div class="modal-content">
            
                <div class="modal-header">
                    
                    <h5 class="modal-title">Editar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                
                   <div class="row justify-content-center">
                    
                        <div class="col-sm-12 col-md-10 col-lg-8">
                       
                       
                            <form>
                            
                            
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                      <h5>Jair Messias Bolsonaro</h5>

                                    </div>

                                </div>
                                
                                <div class="form-row">
                                    
                                    <div class="form-group col-lg-12">
                                        <label for="exampleFormControlSelect1">O usuário é:</label>
                                        <select class="form-control" id="tipo_user">
                                          <option>Servidor</option>
                                          <option>Munícipe</option>
                                          <option>Instrutor</option>
                                          <option>Administrador</option>
                                        </select>
                                    </div>

                                </div>
                                
                                
                                <div class="form-row">
                
                                    <div class="form-group ">

                                        <button type="submit" class="btn btn-success">Editar</button>

                                    </div>

                                </div>
                            
                            </form>
                       
                       </div>
                    
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Fechar
                    </button>
                </div>
            
            </div> 
        </div> 
      
     </div>

<script>

//    O bloco de comando abaixo irá exibir ou não o campo de matrícula, de acordo com o que for selecionado pelo usuário
    
      $("input[type=radio]").on("change", function() {
        
          var opcao = $(this).val();
            
            if (opcao == "servidor") {
                    
                      $('#estudantes').load("<?=BASE_URL?>Adm/table/servidores");

            } else if (opcao == "municipe") {
              
                      $('#estudantes').load("<?=BASE_URL?>Adm/table/municipes");

            }
          });

    $(document).ready(function(){
        
        $('#estudantes').load("<?=BASE_URL?>Adm/table/servidores");
    });

</script>
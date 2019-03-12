<div class="container">

     <div class="row">
    
        <div class="col-12 text-center mt-5">
        
            <h1 class="display-4"><i class="far fa-edit text-primary"></i> Editar Curso Presencial</h1> 
            <p class="mt-4">Os campos que tiverem * são de preenchimento obrigatório.</p>
            <hr>
        </div>
         
    </div>

          <div class="row justify-content-center">
                    
                        <div class="col-sm-12 col-md-10 col-lg-8">
                       
                       
                            <form>
                            
                            
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                      <label class="" for="inputNomeCurso">Nome do Curso</label>
                                      <input type="text" class="form-control" id="inputNomeCurso" placeholder="Ex: Curso de Atendimento ao Público" required>

                                    </div>

                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                                      <label class="" for="inputInicio">Início</label>
                                      <input type="date" class="form-control" id="inputInicio" required>

                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                                      <label class="" for="inputHorario">Horário de Início</label>
                                      <input type="time" class="form-control" id="inputHorario" required>

                                    </div>

                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                                      <label class="" for="inputFim">Fim</label>
                                      <input type="date" class="form-control" id="inputFim" required>

                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-12 col-lg-6">

                                      <label class="" for="inputTotal">Total de horas</label>
                                      <input type="number" class="form-control" id="inputTotal" required>

                                    </div>

                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                      <label class="control-label">Descrição</label>
                                      <textarea class="form-control" name="txt_descricao" rows="6" maxlength="300" placeholder="Descreva o conteúdo. Máximo 300 carecteres."></textarea>

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

            <div class="row justify-content-center mt-3">

                <div class="col-lg-10">
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Instrutor</th>
                          <th scope="col">Excluir</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>Jair Bolsonaro</td>
                          <td><button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                        </tr>
                        <tr>

                          <td>Fernando Haddad</td>
                          <td><button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>

                        </tr>

                      </tbody>
                </table>

                
                </div>
                
                <div class="form-row ml-1">
                
                     <div class="form-group ">

                        <a type="submit" class="btn btn-success" href="#" data-toggle="modal" data-target="#modalInstrutor">Adicionar Instrutor</a>

                    </div>

                </div>
                    
            </div>
</div> <!-- container -->

   <!-- ### MODAL #### -->
      
     <div class="modal fade" id="modalInstrutor" tabindex="-1" role="dialog">
      
        <div class="modal-dialog  modal-lg" role="document">
         
            <div class="modal-content">
            
                <div class="modal-header">
                    
                    <h5 class="modal-title">Adicionar Instrutor</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    
                </div>
                
                <div class="modal-body">
                
                   <div class="row justify-content-center">
                    
                        <div class="col-sm-12 col-md-10 col-lg-8">
                       
                       
                            <form>
                            
                            
                                <div class="form-row">

                                    <div class="form-group col-md-6 col-sm-12 col-12 col-lg-6">

                                      <label class="" for="inputCpf">CPF</label>
                                      <input type="text" class="form-control" id="inputCpf" placeholder="123.456.789-0" required>

                                    </div>

                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                      <label class="" for="txt_instrutor">Nome</label>
                                      <input type="text" class="form-control" id="txt_instrutor" placeholder="" required>

                                    </div>

                                </div>
                                
                                
                                <div class="form-row">

                                    <div class="form-group col-md-12 col-sm-12 col-12 col-lg-12">

                                      <label class="control-label">Descrição</label>
                                      <textarea class="form-control" name="txt_descricao" rows="6" maxlength="300" placeholder="Coloque uma breve descrição do instrutor. Máximo 300 carecteres."></textarea>

                                    </div>
                                    
                                </div>
                                
                                <div class="form-row">
                
                                    <div class="form-group ">

                                        <button type="submit" class="btn btn-success">Adicionar</button>

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

$(document).ready(function(){
        
      $('#inputCpf').mask('000.000.000-00');
      
    });

</script>
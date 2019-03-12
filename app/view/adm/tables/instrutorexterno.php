<button type="submit" class="btn btn-success mb-3"  data-toggle="modal" data-target="#modalInstrutorExterno">Adicionar Instrutor</button>

<table class="table table-hover">
                    <thead>
                        <tr>
                          <th scope="col">Nome</th>
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
                          
                        <tr>
                          <td>Renan Carneiros</td>
                          <td><button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>

                        </tr>

                      </tbody>
</table>

   <!-- ### MODAL #### -->
      
     <div class="modal fade" id="modalInstrutorExterno" tabindex="-1" role="dialog">
      
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      
        <div class="container">
            

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">
                
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDropCursos">Cursos</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/cursopresencial">Presencial</a> 
                                <a class="dropdown-item" href="#">EAD</a>     
                            </div>

                      </li>
                    
                    
                      <li class="nav-item">
                        <a class="nav-link" href="<?=BASE_URL?>Adm/pagina/instrutores">Instrutores</a>  
                      </li> 

                      <li class="nav-item">
                            <a class="nav-link" href="<?=BASE_URL?>Adm/pagina/estudantes">Estudantes</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="#">Certificados</a>  
                      </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Material</a>  
                    </li>    
                    
                </ul> 
              
              <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Olá Severino</a>
                        
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?=BASE_URL?>Adm/pagina/configuracoes">Configurações</a> 
                             <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sair</a>     
     
                        </div>
                        
                    </li>
                </ul>
                
            </div>
            
        </div>
          
</nav>

<?php 
Class Adm extends Controller{

    //Carrega o menu
	private function menu(){
		require_once("app/view/includes/menu-adm.php");
	}

    //Carrega as páginas
	public function pagina($pagina){

        //Verifica se o usuário está logado e se a pagina corresponde ao seu tipo de usuario
        if(parent::verifica_login() && parent::valida_usuario('A')){
        
            $arquivo = "app/view/adm/" . $pagina .".php";
            
            if(parent::validador($arquivo)){
                
                parent::header();
                self::menu();
                require_once($arquivo);
                parent::footer();
            }
        }else{

            $login = new Login();
            $login->index();
        } 
	}//pagina()
    
    //Carrega apenas a tabela na pg de estudantes
    public function table($tabela){
        require_once("app/view/adm/tables/" . $tabela . ".php");
    }
}

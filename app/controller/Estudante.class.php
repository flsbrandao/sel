<?php
Class Estudante extends Controller{
     
    private function menu(){
        require_once("app/view/includes/menu-estudante.php");
    }
    
    public function pagina($pagina){
    
       //Verifica se o usuário está logado e se a pagina corresponde ao seu tipo de usuario
        if(parent::verifica_login() && parent::valida_usuario('est')){

             $arquivo = "app/view/estudante/" . $pagina .".php";
        
            //O if abaixo verifica se a página solicitada existe
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
    } //pagina()
    
    public function table($table){
        require_once("app/view/estudante/tables/" . $table . ".php");
    }
}
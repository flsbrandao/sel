<?php
Class Instrutor extends Controller{
    
    private function menu(){
        require_once("app/view/includes/menu-instrutor.php");
    }
    
    public function pagina($pagina){
        
        //Verifica se o usuário está logado e se a pagina corresponde ao seu tipo de usuario
        if(parent::verifica_login() && parent::valida_usuario('I')){
            $arquivo = "app/view/instrutor/" . $pagina .".php";
            
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
        require_once("app/view/instrutor/tables/" . $table . ".php");
    }
}
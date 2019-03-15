<?php
Class Estudante extends Controller{
    
    private function menu(){
        require_once("app/view/includes/menu-estudante.php");
    }
    
    public function pagina($pagina){
        
        $arquivo = "app/view/estudante/" . $pagina .".php";
        
        if(parent::validador($arquivo)){
            
            parent::header();
            self::menu();
            require_once($arquivo);
            parent::footer();
        }
    } //pagina()
    
    public function table($table){
        require_once("app/view/estudante/tables/" . $table . ".php");
    }
}
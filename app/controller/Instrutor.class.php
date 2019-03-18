<?php
Class Instrutor extends Controller{
    
    private function menu(){
        require_once("app/view/includes/menu-instrutor.php");
    }
    
    public function pagina($pagina){
        
        $arquivo = "app/view/instrutor/" . $pagina .".php";
        
        if(parent::validador($arquivo)){
            
            parent::header();
            self::menu();
            require_once($arquivo);
            parent::footer();
        }
    } //pagina()
    
    public function table($table){
        require_once("app/view/instrutor/tables/" . $table . ".php");
    }
}
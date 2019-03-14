<?php
Class Controller {

	protected function header(){

		require_once ("app/view/includes/header.php");
	}

	protected function footer(){

		require_once ("app/view/includes/footer.php");
	}
    //O método abaixo irá validar se a página requisitada existe
    protected function validador($arquivo){
        
        if(file_exists($arquivo)){
            
            return true;
            
        }else{
            
            self::header();
            require_once ("app/view/404.php");
            self::footer();
            return false;
        }
    } // validador()
}

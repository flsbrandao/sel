<?php
Class Controller {

    //Método construtor
    public function __construct(){
        session_start();
    }

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

    protected function verifica_login(){

        //Impede que os erros sejam exibidos na tela do usuário
        error_reporting(0);
        ini_set(“display_errors”, 0 );

        if(($_SESSION['id'] != session_id()) || (empty($_SESSION['id']))){

           return false;
        }

        return true;
   }//verifica_login()

    protected function valida_usuario($tipo){

        if($_SESSION['tipo'] != $tipo){

           session_unset(); // Limpa todas as variáveis de sessão
           session_destroy();//Destroi toda e qualquer sessão criada

            return false;
        }

        return true;
    }
 
}//Class
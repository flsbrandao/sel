<?php 
Class Adm extends Controller{

    //Carrega o meneu
	private function menu(){
		require_once("app/view/includes/menu-adm.php");
	}

    //Carrega as páginas
	public function pagina($pagina){

		parent::header();
		self::menu();
		require_once("app/view/adm/" . $pagina .".php");
		parent::footer();
	}
    
    //Carrega apenas a tabela na pg de estudantes
    public function table($tabela){
        require_once("app/view/adm/" . $tabela . ".php");
    }
}
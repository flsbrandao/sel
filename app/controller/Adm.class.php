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

    public function adicionar_instrutor_ext(){
        $cpf = $_POST['inputCpf'];
        $nome = $_POST['inputNome'];
        $descricao = $_POST['txt_descricao'];

        $objInstrutor = new M_InstrutorExterno(Conexao::getInstance());
        $retorno = $objInstrutor->adicionar_instrutor_ext($cpf,$nome,$descricao);

        echo $retorno;
    }//adicionar_instrutor_ext()

    public function listar_instrutor_ext(){

        $objInstrutor = new M_InstrutorExterno(Conexao::getInstance());
        $retorno = $objInstrutor->listar_instrutor_ext();

        echo json_encode($retorno);
    }

    public function desativa_instrutor_ext(){
        $cpf = $_POST['cpf'];
        $objInstrutor = new M_InstrutorExterno(Conexao::getInstance());
        $retorno = $objInstrutor->desativa_instrutor_ext($cpf);
        echo $retorno;
    }//desativa_instrutor_ext()
}//Class

<?php
Class Login extends Controller{

	/*
		Chama a página de login
	*/
	public function index(){
		
		parent::header();
		require_once("app/view/logincadastro/login.php");
		parent::footer();
	}
	
	public function logar(){

		$login = $_POST['inputLogin'];
		$senha = $_POST['inputSenha'];

		//Criptografa a senha
		$salt = 'wilhelmklaus2019'.$senha.'sherlokholmes';
        $hasha = hash('sha512', $salt);

		$objLogin = new M_Login(Conexao::getInstance());

		$retorno = $objLogin->logar($login, $hasha);

		echo $retorno;

	}//logar()

	public function logout(){

		$objLogin = new M_Login(Conexao::getInstance());
		$objLogin->logout();
		self::index();
	}

}//Class

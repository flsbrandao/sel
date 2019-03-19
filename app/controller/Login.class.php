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
	//Chama a tela de cadastro
	public function cadastro(){
		
		parent::header();
		require_once("app/view/logincadastro/cadastro.php");
		parent::footer();
	}


	public function cadastrar_usuario(){

		$nome = $_POST['inputNome'];
		$cpf = $_POST['inputCpf'];
		$data_nasc = $_POST['inputData'];
		$email = $_POST['inputEmail'];
		$celular = $_POST['inputCelular'];
		$telefone = $_POST['inputTelefone'];
		$cep = $_POST['inputCep'];
		$uf = $_POST['inputUf'];
		$municipio = $_POST['inputMunic'];
		$endereco = $_POST['inputEndereco'];
		$bairro = $_POST['inputBairro'];
		$numero = $_POST['inputNumero'];
		$complemento = $_POST['inputComplemento'];
		$login = $_POST['inputLogin'];
		$senha = $_POST['inputSenha'];
		$categoria = $_POST['categoria'];
		$matricula = $_POST['inputMatricula'];

		$objUsuario = new M_Usuario(Conexao::getInstance());
		$objLogin = new M_Login(Conexao::getInstance());

		$validar_cep = self::validar_cep($cep);

		if($validar_cep == false){
			$objEndereco = new M_Endereco(Conexao::getInstance());
			$objEndereco->cadastro($cep,$endereco,$bairro,$municipio,$uf);
		}
		
		
		$objUsuario->cadastro($cpf,$nome,$data_nasc,$email,$celular,$telefone,$numero,$complemento,$categoria,$matricula);
		$objLogin->cadastro($cpf,$login,$senha);
		
		echo "1";
	}

	//O método abaixo irá validar se o CPF informado pelo usuário não está cadastrado no banco
	public function validar_cpf(){

		$cpf = $_POST['cpf'];

		$objUsuario = new M_Usuario(Conexao::getInstance());
		$retorno = $objUsuario->validar_cpf($cpf);

		echo $retorno;
	}

    //O método abaixo irá validar se o login informado pelo usuário não está cadastrado no banco
	public function validar_login(){

		$login = $_POST['login'];

		$objLogin = new M_Login(Conexao::getInstance());
		$retorno = $objLogin->validar_login($login);

		echo $retorno;
	}

	public function validar_cep($cep){

		$objEndereco = new M_Endereco(Conexao::getInstance());
		$retorno = $objEndereco->validar_cep($cep);

		return $retorno;
	}

}//Class

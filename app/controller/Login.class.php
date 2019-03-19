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
		$usuario = $_POST['inputUsuario'];
		$senha = $_POST['inputSenha'];
		$categoria = $_POST['categoria'];
		$matricula = $_POST['inputMatricula'];

		$objUsuario = new M_Usuario(Conexao::getInstance());
		$objEndereco = new M_Endereco(Conexao::getInstance());
		$objLogin = new M_Login(Conexao::getInstance());
		
		$objUsuario->cadastro($cpf,$nome,$data_nasc,$email,$celular,$telefone,$numero,$complemento,$categoria,$matricula);
		$objEndereco->cadastro($cep,$endereco,$bairro,$municipio,$uf);
		$objLogin->cadastro($cpf,$usuario,$senha);
		
		echo "1";
	}

}//Class

<?php
Class Usuario extends Controller{

	public function listar_usuarios(){

		$tipo = $_POST['tipo'];
		$categoria = $_POST['categoria'];
		$objUsuario = new M_Usuario(Conexao::getInstance());
		$retorno = $objUsuario->listar_usuarios($tipo,$categoria);

		echo json_encode($retorno);
	}

	public function desativar_instrutor(){

		$cpf = $_POST['cpf'];
		$objLogin = new M_Login(Conexao::getInstance());
		$retorno = $objLogin->alterar_tipo_usuario($cpf,'E');

		echo $retorno;
	}

	//O método abaixo irá alterar o estudante servidor p/ instrutor ou municipe
	public function alterar_servidor(){

		$cpf = $_POST['inputCpf'];
		$categoria = $_POST['slc_categoria'];

		if($categoria === 'I'){

			$objLogin = new M_Login(Conexao::getInstance());
			$retorno = $objLogin->alterar_tipo_usuario($cpf,$categoria);

		}else if($categoria === 'M'){

			$objUsuario = new M_Usuario(Conexao::getInstance());
			$retorno = $objUsuario->alterar_servidor_municipe($cpf,$categoria);

		}else{
			$retorno = false;
		}

		echo $retorno;
	}//alterar_servidor()

	public function carregar_usuario()
	{
		$cpf = $_POST['cpf'];
		$objUsuario = new M_Usuario(Conexao::getInstance());
		$retorno = $objUsuario->carregar_usuario($cpf);
		
		echo json_encode($retorno);

	}//Carregar Usuario
}//Class

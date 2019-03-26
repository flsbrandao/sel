<?php 
Class Usuario extends Controller{

	public function listar_usuarios(){

		$categoria = $_POST['categoria'];
		$objUsuario = new M_Usuario(Conexao::getInstance());
		$retorno = $objUsuario->listar_usuarios($categoria);

		echo json_encode($retorno);
	}
}
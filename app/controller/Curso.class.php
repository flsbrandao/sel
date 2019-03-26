<?php
Class Curso extends Controller{

	public function adicionar_curso(){

		$nome = $_POST['inputNomeCurso'];
		$total = $_POST['inputTotal'];
		$descricao = $_POST['txt_descricao'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->adicionar_curso($nome,$total,$descricao);

		echo $retorno;
	}//adicionar_curso()

	public function listar_allcursos(){

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->listar_allcursos();
		echo json_encode($retorno);
	}

	public function listar_curso(){

		$codigo = $_POST['codigo'];
		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->listar_curso($codigo);
		echo json_encode($retorno);
	}

	public function desativar_curso(){

		$codigo = $_POST['codigo'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->desativar_curso($codigo);

		echo $retorno;

	}

	public function editar_curso(){

		$codigo = $_POST['codigo'];
		$nome = $_POST['inputNomeCurso'];
		$total = $_POST['inputTotal'];
		$descricao = $_POST['txt_descricao'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->editar_curso($codigo,$nome,$total,$descricao);

		echo $retorno;
	}

}//Class
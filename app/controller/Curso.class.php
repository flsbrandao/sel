<?php
Class Curso extends Controller{

	public function adicionar(){

		$nome = $_POST['inputNomeCurso'];
		$inicio = $_POST['inputInicio'];
		$fim = $_POST['inputFim'];
		$horario = $_POST['inputFim'];
		$total = $_POST['inputTotal'];
		$quantidade = $_POST['inputQuantidade'];
		$limitar = $_POST['inputLimitacao'];
		$categoria = $_POST['radio_curso'];
		$descricao = $_POST['txt_descricao'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->adicionar($nome,$inicio,$fim,$horario,$total,$quantidade,$limitar,$categoria,$descricao);

		echo $retorno;
	}//adicionar()

}//Class
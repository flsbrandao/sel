<?php
Class Curso extends Controller{

	public function adicionar_curso(){

		$nome = $_POST['inputNomeCurso'];
		$inicio = $_POST['inputInicio'];
		$fim = $_POST['inputFim'];
		$horario = $_POST['inputHorario'];
		$total = $_POST['inputTotal'];
		$quantidade = $_POST['inputQuantidade'];
		$limitar = $_POST['inputLimitacao'];
		$categoria = $_POST['radio_curso'];
		$descricao = $_POST['txt_descricao'];
		$dias = $_POST['dias'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->adicionar_curso($nome,$inicio,$fim,$horario,$total,$quantidade,$limitar,$categoria,$descricao);
		//Irá contar o número total de vetores. Ao subtrair '1' desse numero
	
		$codigo = count($retorno);

		//Insere os dias de curso
		foreach ($dias as $valores => $v) {
		 	$objCurso->adicionar_dias($codigo,$v);
		}

		$_SESSION['curso'] = $codigo;

		echo true;
	}//adicionar_curso()

	public function listar_curso(){

		$codigo = $_POST['codigo'];
		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->listar_curso($codigo);
		// var_dump($codigo);
		// var_dump($retorno);
		//var_dump(json_encode($retorno));
		echo json_encode($retorno);
		
	}

}//Class
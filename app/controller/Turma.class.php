<?php
Class Turma extends Controller{

	public function adicionar_turma(){

		$curso = $_POST['slc_cursos'];
		$inicio = $_POST['inputInicio'];
		$fim = $_POST['inputFim'];
		$horario = $_POST['inputHorario'];
		$quantidade = $_POST['inputQuantidade'];
		$limitar = $_POST['inputLimitacao'];
		$categoria = $_POST['radio_curso'];
		$dias = $_POST['dias'];

		$objTurma = new M_Turma(Conexao::getInstance());
		$retorno = $objTurma->adicionar_turma($curso,$inicio,$fim,$horario,$quantidade,$limitar,$categoria);
		
		$codigo = count($retorno);

		//Insere os dias de curso
		foreach ($dias as $valores => $v) {
		 	$objCurso->adicionar_dias($codigo,$v);
		}

		$_SESSION['curso'] = $codigo;

		echo true;
	}//adicionar_turma()

	public function listar_dias(){

		$codigo = $_POST['codigo'];
		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->listar_dias($codigo);
		echo json_encode($retorno);
	}
}
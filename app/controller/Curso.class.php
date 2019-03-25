<?php
Class Curso extends Controller{

	public function adicionar_turma(){

		
		$inicio = $_POST['inputInicio'];
		$fim = $_POST['inputFim'];
		$horario = $_POST['inputHorario'];
		
		$quantidade = $_POST['inputQuantidade'];
		$limitar = $_POST['inputLimitacao'];
		$categoria = $_POST['radio_curso'];
		
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
	}//adicionar_turma()

	public function adicionar_curso(){

		$nome = $_POST['inputNomeCurso'];
		$total = $_POST['inputTotal'];
		$descricao = $_POST['txt_descricao'];

		$objCurso = new M_Curso(Conexao::getInstance());
		$objCurso->adicionar_curso($nome,$total,$descricao);

		echo true;
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

	public function listar_dias(){

		$codigo = $_POST['codigo'];
		$objCurso = new M_Curso(Conexao::getInstance());
		$retorno = $objCurso->listar_dias($codigo);
		echo json_encode($retorno);
	}

}//Class
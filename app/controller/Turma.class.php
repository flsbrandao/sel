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
		$retorno = $objTurma->adicionar_turma($curso,$inicio,$fim,$quantidade,$limitar,$categoria);
		
		$codigo = count($retorno);

		//Insere os dias de curso
		foreach ($dias as $valores => $v) {
		 	$objTurma->adicionar_dias($codigo,$v, $horario);
		}

		//O array retorna o valor true, e o codigo (PK) da turma inserida
		$array = array(true, $codigo);

		echo json_encode($array);
	}//adicionar_turma()

	public function adicionar_instrutor_ser(){
		$cod_turma = $_POST['inputModalTurma'];
		$instrutores = $_POST['instrutor'];

		$objTurma = new M_Turma(Conexao::getInstance());

		foreach ($instrutores as $key => $value) {
			
			$objTurma->adicionar_instrutor_ser($cod_turma,$value);
		}

		$array = array(true, $cod_turma);

		echo json_encode($array);

	}//adicionar_instrutor()

	public function adicionar_instrutor_ext(){
		$cod_turma = $_POST['inputModalTurmaExt'];
		$instrutores = $_POST['instrutor'];

		$objTurma = new M_Turma(Conexao::getInstance());

		foreach ($instrutores as $key => $value) {
			
			$objTurma->adicionar_instrutor_ext($cod_turma,$value);
		}

		$array = array(true, $cod_turma);

		echo json_encode($array);

	}//adicionar_instrutor()

	public function listar_dias(){

		$codigo = $_POST['codigo'];
		$objCurso = new M_Turma(Conexao::getInstance());
		$retorno = $objCurso->listar_dias($codigo);
		echo json_encode($retorno);
	}//listar_dias()

	public function carregar_turma(){
		$codigo = $_POST['codigo'];
		$objTurma = new M_Turma(Conexao::getInstance());
		$retorno = $objTurma->carregar_turma($codigo);

		echo json_encode($retorno);
	}//carregar_turma()

	//Carrega os instrutores já cadastrados no curso
	public function carrega_instrutor_ser(){
		$cod_turma = $_POST['cod_turma'];
		$objTurma = new M_Turma(Conexao::getInstance());
		$retorno = $objTurma->carrega_instrutor_ser($cod_turma);

		echo json_encode($retorno);
	}//carrega_instrutor_ser()

	public function listar_turmas(){
		$situacao = $_POST['situacao'];
		$objTurma = new M_Turma(Conexao::getInstance());
		$retorno = $objTurma->listar_turmas($situacao);

		echo json_encode($retorno);
	}//listar_turmas()

	public function desativar_turma(){
		$cod_turma = $_POST['codigo'];
		$objTurma = new M_Turma(Conexao::getInstance());
		$retorno = $objTurma->desativar_turma($cod_turma);

		echo $retorno;

	}//desativar_turma()
}//Class
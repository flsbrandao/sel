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
		
		$codigo = $retorno[0];

		//Insere os dias de curso
		foreach ($dias as $valores => $v) {
		 	$objTurma->adicionar_dias($codigo,$v, $horario);
		}

		//O array retorna o valor true, e o codigo (PK) da turma inserida
		$array = array(true, $codigo);

		echo json_encode($array);

	}//adicionar_turma()

	public function editar_turma(){

		$cod_turma = $_POST['inputCodTurma'];
		$inicio = $_POST['inputInicio'];
		$fim = $_POST['inputFim'];
		$horario = $_POST['inputHorario'];
		$quantidade = $_POST['inputQuantidade'];
		$limitar = $_POST['inputLimitacao'];
		$categoria = $_POST['radio_curso'];
		$dias = $_POST['dias'];

		 $objTurma = new M_Turma(Conexao::getInstance());

		$retorno = $objTurma->editar_turma($cod_turma,$inicio,$fim,$quantidade,$limitar,$categoria);

		$objTurma->deletar_dias($cod_turma);
		
		foreach ($dias as $valores => $v) {
			$retorno = $objTurma->adicionar_dias($cod_turma,$v, $horario);
		}

		echo $retorno;

	}//editar_turma()

	public function adicionar_instrutor(){

		$cod_turma = $_POST['codTurma'];
		$instrutores = $_POST['instrutor'];
		$tipo_instrutor = $_POST['tipo_instrutor'];

		$objTurma = new M_Turma(Conexao::getInstance());

		if($tipo_instrutor === 'S'){
			//Caso o instrutor for servidor
			foreach ($instrutores as $key => $value) {
				$objTurma->adicionar_instrutor_ser($cod_turma,$value);
			}

		}else if($tipo_instrutor === 'E'){
			//Caso o instrutor for externo
			foreach ($instrutores as $key => $value) {
				$objTurma->adicionar_instrutor_ext($cod_turma,$value);
			}
		}

		$array = array(true, $cod_turma);

		echo json_encode($array);

	}//Adiconar_instrutor()

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

	//carrega os intrutores inscritos no curso
	public function carregar_instrutor(){
		$cod_turma = $_POST['cod_turma'];
		$instrutor = $_POST['instrutor'];

		$objTurma = new M_Turma(Conexao::getInstance());

		if($instrutor === 'S'){
			$retorno = $objTurma->carrega_instrutor_ser($cod_turma);
		}else if($instrutor === 'E'){
			$retorno = $objTurma->carrega_instrutor_ext($cod_turma);
		}
		echo json_encode($retorno);	
	}//carregar_instrutor

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

	public function excluir_instrutor(){
		$cod_turma = $_POST['cod_turma'];
		$cpf = $_POST['cpf'];
		$instrutor = $_POST['instrutor'];

		$objTurma = new M_Turma(Conexao::getInstance());

		if($instrutor === 'S'){
			$retorno = $objTurma->deletar_instrutor_ser($cod_turma, $cpf);
		}else if($instrutor === 'E'){
			$retorno = $objTurma->deletar_instrutor_ext($cod_turma, $cpf);
		}

		echo $retorno;
	}// excluir_instrutor()
}//Class
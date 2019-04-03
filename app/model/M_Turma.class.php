<?php
Class M_Turma extends Model {

	public function adicionar_turma($curso,$inicio,$fim,$quantidade,$limite,$categoria){

		try{
			$sql = "INSERT INTO tb_turma (cod_curso, inicio, fim, quant_aulas,limite_inscritos,categoria) VALUES (?,?,?,?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $curso);
			$stm->bindValue(2, $inicio);
			$stm->bindValue(3, $fim);
			$stm->bindValue(4, $quantidade);
			$stm->bindValue(5, $limite);
			$stm->bindValue(6, $categoria);
	
			$stm->execute();

			//A query abaixo irá pegar os últimos ID auto_incremet inseridos na tabela tb_curso
			$query = "SELECT LAST_INSERT_ID(codigo) FROM tb_turma";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			$dados = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_curso()

	public function adicionar_dias($codigo, $dia, $horario){

		try{
			$sql = "INSERT INTO tb_dias (codigo_turma, dias, horario) VALUES (?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->bindValue(2, $dia);
			$stm->bindValue(3, $horario);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_dias();

	public function listar_dias($codigo){
		try{
			$sql = "SELECT dias, horario FROM tb_dias WHERE codigo_turma = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$codigo);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);
			return $dados;
			
		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_dias()

	public function carregar_turma($codigo){
		try{
			$sql = "SELECT tb_turma.codigo as cod_turma, cod_curso, inicio, fim, quant_aulas as quantidade, categoria, limite_inscritos as limite, sit_turma, nome FROM tb_turma INNER JOIN tb_curso ON (tb_turma.cod_curso = tb_curso.codigo) WHERE tb_turma.codigo = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->execute();
			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//carregar_turma()

	//Adiciona instrutor servidor
	public function adicionar_instrutor_ser($codigo,$value){
		try{
			$sql = "INSERT INTO tb_lecionar (cod_turma, cpf_servidor) VALUES (?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$codigo);
			$stm->bindValue(2,$value);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_instrutor_ser()

	//Adiciona instrutor servidor
	public function adicionar_instrutor_ext($codigo,$value){
		try{
			$sql = "INSERT INTO tb_lecionar (cod_turma, cpf_externo) VALUES (?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$codigo);
			$stm->bindValue(2,$value);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_instrutor_ser()

	public function carrega_instrutor_ser($cod_turma){
		try{
			$sql = "SELECT tb_usuario.nome as nome_servidor,  cpf_servidor FROM tb_lecionar INNER JOIN tb_usuario ON (tb_usuario.cpf = tb_lecionar.cpf_servidor) WHERE cod_turma = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$cod_turma);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//carrega_instrutor_ser();

	public function listar_turmas($situacao){
		try{
			$sql = "SELECT tb_turma.codigo, tb_curso.nome, inicio, fim FROM tb_turma INNER JOIN tb_curso ON (tb_curso.codigo = tb_turma.cod_curso) WHERE sit_turma = ? AND tb_turma.situacao = 'A'";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $situacao);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_turmas()

	public function desativar_turma($codigo){
		try{
			$sql = "UPDATE tb_turma SET situacao = 'D' WHERE codigo = ? ";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->execute();

			return true;
			
		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//desativar_turma()

}//Class
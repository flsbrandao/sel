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
}//Class
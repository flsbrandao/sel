<?php
Class M_Curso extends Model{

	public function adicionar_curso($nome,$inicio,$fim,$horario,$total,$quantidade,$limitar,$categoria,$descricao){

		try{
			$sql = "INSERT INTO tb_curso (nome, inicio, fim, horario, total_horas, quant_aulas,limite_inscritos,categoria, descricao) VALUES (?,?,?,?,?,?,?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$nome);
			$stm->bindValue(2, $inicio);
			$stm->bindValue(3, $fim);
			$stm->bindValue(4, $horario);
			$stm->bindValue(5, $total);
			$stm->bindValue(6, $quantidade);
			$stm->bindValue(7, $limitar);
			$stm->bindValue(8, $categoria);
			$stm->bindValue(9, $descricao);
			$stm->execute();

			//A query abaixo irá pegar os últimos ID auto_incremet inseridos na tabela tb_curso
			$query = "SELECT LAST_INSERT_ID(codigo) FROM tb_curso";
			$stmt = $this->pdo->prepare($query);
			$stmt->execute();
			$dados = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_curso()

	public function adicionar_dias($codigo, $dia){

		try{
			$sql = "INSERT INTO tb_dias (codigo_curso, dias) VALUES (?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->bindValue(2, $dia);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_dias();

	public function listar_cursos(){

		try{
			$sql = "SELECT * FROM tb_curso";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_cursos()

	public function listar_curso($codigo){

		try{
			$sql = "SELECT * FROM tb_curso WHERE tb_curso.codigo = ? ";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_ASSOC);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_curso

}//Class
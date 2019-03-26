<?php
Class M_Curso extends Model{

	public function adicionar_curso($nome,$total,$descricao){
		try{
			$sql = "INSERT INTO tb_curso (nome, total_horas, descricao) VALUES (?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $nome);
			$stm->bindValue(2, $total);
			$stm->bindValue(3, $descricao);
			$stm->execute();

			return true;
		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}

	public function listar_allcursos(){

		try{
			$sql = "SELECT * FROM tb_curso WHERE situacao = 'A' ";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_allcursos()

	public function listar_curso($codigo){

		try{
			$sql = "SELECT * FROM tb_curso WHERE tb_curso.codigo = ? ";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $codigo);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_curso

	public function desativar_curso($codigo){

		try{
			$sql = "UPDATE tb_curso SET situacao = 'D' WHERE codigo = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$codigo);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//desativar_curso()

	public function editar_curso($codigo, $nome,$total,$descricao){
		try{
			$sql = "UPDATE tb_curso SET nome = ?, total_horas = ?, descricao = ? WHERE codigo = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $nome);
			$stm->bindValue(2, $total);
			$stm->bindValue(3, $descricao);
			$stm->bindValue(4, $codigo);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//editar_curso()

}//Class
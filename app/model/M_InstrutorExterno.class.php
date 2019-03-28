<?php
Class M_InstrutorExterno extends Model{

	public function adicionar_instrutor_ext($cpf,$nome,$descricao){
		try{
			$sql = "INSERT INTO tb_instrutor_ext (cpf, nome, descricao) VALUES (?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $nome);
			$stm->bindValue(3, $descricao);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar_instrutor_ext()

	public function listar_instrutor_ext(){
		try{
			$sql = "SELECT cpf,nome,descricao FROM tb_instrutor_ext WHERE situacao = 'A'";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//listar_instrutor_ext()

	public function desativa_instrutor_ext($cpf){
		try{
			$sql = "UPDATE tb_instrutor_ext SET situacao = 'D' WHERE cpf = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$cpf);
			$stm->execute();

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//desativa_instrutor_ext()

}//Class
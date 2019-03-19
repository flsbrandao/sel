<?php
Class M_Login extends Model{

	public function cadastro($cpf,$usuario,$senha){

		try{

			$sql = "INSERT INTO tb_login (cpf, login, senha) VALUES (?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $usuario);
			$stm->bindValue(3, $senha);
			$stm->execute();

		}catch(PDOException $e){

			echo 'ERRO: ' . $e->getMessage();
		}
	}
}//Class
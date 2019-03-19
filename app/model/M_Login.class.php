<?php
Class M_Login extends Model{

	public function cadastro($cpf,$login,$senha){

		try{

			$sql = "INSERT INTO tb_login (cpf, login, senha) VALUES (?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $login);
			$stm->bindValue(3, $senha);
			$stm->execute();

		}catch(PDOException $e){

			echo 'ERRO: ' . $e->getMessage();
		}
	}

	public function validar_login($login){

		try{
			$sql = "SELECT * FROM tb_login WHERE login = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $login);
			$stm->execute();

			$rows = $stm->rowCount();

			if($rows === 1){

				$retorno = true;

			}else{

				$retorno = false;
			}

			return $retorno;

		}catch(PDOException $e){

			 echo 'Erro: ' . $e->getMessage();
		}
	}
}//Class
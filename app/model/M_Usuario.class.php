<?php
Class M_Usuario extends Model{

	public function cadastro($cpf,$rg,$nome,$data_nasc,$email,$celular,$telefone,$numero,$complemento,$categoria,$matricula){

		try{

			$sql = "INSERT INTO tb_usuario (cpf,rg,nome,data_nasc,email,celular,telefone,numero,complemento,categoria,matricula) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $rg);
			$stm->bindValue(3, $nome);
			$stm->bindValue(4, $data_nasc);
			$stm->bindValue(5, $email);
			$stm->bindValue(6, $celular);
			$stm->bindValue(7, $telefone);
			$stm->bindValue(8, $numero);
			$stm->bindValue(9, $complemento);
			$stm->bindValue(10, $categoria);
			$stm->bindValue(11, $matricula);
			$stm->execute();

			return true;

		}catch (PDOException $e){

			echo 'ERRO: ' . $e->getMessage();

			return false;
		}
	} // cadastro

	public function validar_cpf($cpf){

		try{
			$sql = "SELECT * FROM tb_usuario WHERE cpf = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
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
	}// Valida CPF

	public function validar_email($email){

		try{
			$sql = "SELECT * FROM tb_usuario WHERE email = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $email);
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
	}// Valida CPF

	public function validar_matricula($matricula){

		try{
			$sql = "SELECT * FROM tb_usuario WHERE matricula = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $matricula);
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
	}//valida_matricula()

	public function validar_rg($rg){

		try{
			$sql = "SELECT * FROM tb_usuario WHERE rg = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $rg);
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
	}//valida_rg()

	public function listar_usuarios($tipo,$categoria){
		try{
			$sql = "SELECT tb_usuario.cpf, nome, matricula, categoria FROM tb_usuario INNER JOIN tb_login ON (tb_usuario.cpf = tb_login.cpf) WHERE tb_login.tipo = ? AND categoria = ? ";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$tipo);
			$stm->bindValue(2,$categoria);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOException $e){

			 echo 'Erro: ' . $e->getMessage();
			 return false;
		}
	}//Listar_usuarios()

	public function alterar_servidor_municipe($cpf,$categoria){
		try{
			$sql = "UPDATE tb_usuario SET categoria = ? WHERE cpf = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $categoria);
			$stm->bindValue(2, $cpf);
			$stm->execute();

			return true;

		}catch(PDOException $e){

			 echo 'Erro: ' . $e->getMessage();
			 return false;
		}
	}//alterar_servidor_municipe()

	public function carregar_usuario($cpf)
	{
		try
		{
			$sql = "SELECT * FROM tb_usuario WHERE cpf = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->execute();
			$dados = $stm->fetchAll(PDO::FETCH_OBJ);
			return $dados;
		}catch(PDOException $e)
		{

			 echo 'Erro: ' . $e->getMessage();
			 return false;
		}
	}//carregar_usuario()

}//Class

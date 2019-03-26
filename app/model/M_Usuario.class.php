<?php 
Class M_Usuario extends Model{

	public function cadastro($cpf,$nome,$data_nasc,$email,$celular,$telefone,$numero,$complemento,$categoria,$matricula){

		try{

			$sql = "INSERT INTO tb_usuario (cpf,nome,data_nasc,email,celular,telefone,numero,complemento,categoria,matricula) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $nome);
			$stm->bindValue(3, $data_nasc);
			$stm->bindValue(4, $email);
			$stm->bindValue(5, $celular);
			$stm->bindValue(6, $telefone);
			$stm->bindValue(7, $numero);
			$stm->bindValue(8, $complemento);
			$stm->bindValue(9, $categoria);
			$stm->bindValue(10, $matricula);
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

	public function listar_usuarios($categoria){
		try{
			$sql = "SELECT id, nome, matricula, categoria FROM tb_usuario INNER JOIN tb_login ON (tb_usuario.cpf = tb_login.cpf) WHERE tb_login.tipo = 'est' AND categoria = ? ";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1,$categoria);
			$stm->execute();

			$dados = $stm->fetchAll(PDO::FETCH_OBJ);

			return $dados;

		}catch(PDOException $e){

			 echo 'Erro: ' . $e->getMessage();
			 return false;
		}
	}
}//Class

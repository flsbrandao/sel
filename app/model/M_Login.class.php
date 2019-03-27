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

			return true;

		}catch(PDOException $e){

			echo 'ERRO: ' . $e->getMessage();

			return false;
		}
	}// cadastro()

	public function logar($login, $senha){

		try{
			$sql = "SELECT tb_login.cpf,tipo, nome FROM tb_login INNER JOIN tb_usuario ON (tb_login.cpf = tb_usuario.cpf) WHERE login = ? AND senha = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $login);
			$stm->bindValue(2, $senha);
			$stm->execute();

			$rows = $stm->rowCount();
			
			//Se foi retornado apenas uma linha do banco, significa que o usuário e senha são válidos
			if($rows === 1){

				$_SESSION['id'] = session_id();

				$dados = $stm->fetchAll(PDO::FETCH_OBJ);

				foreach($dados as $registro){

					$tipo = $registro->tipo;

					$_SESSION['cpf'] = $registro->cpf;
					$_SESSION['tipo'] = $registro->tipo;

					//Pega o primeiro nome do usuário
					$nome = explode(" ", $registro->nome);
					$_SESSION['nome'] = $nome[0];

				}
				
				return $tipo;

			}else{
				session_unset(); //Limpa todas as váriaveis de sessão
				session_destroy(); //Destroi todas as variáveis de sessão criadas;

				return false;
			}

		}catch(PDOException $e){

			echo 'ERRO: ' . $e->getMessage();
		}
	}//logar()

	public function logout(){

		session_unset();
		session_destroy();

	}//logout();

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
	} // validar login

	public function	alterar_tipo_usuario($cpf,$tipo){
		try{
			$sql = "UPDATE tb_login SET tipo = ? WHERE cpf = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $tipo);
			$stm->bindValue(2, $cpf);
			$stm->execute();

			return true; 
			
		}catch(PDOException $e){

			 echo 'Erro: ' . $e->getMessage();
			 return false;
		}
	}//alterar_tipo_usuario()

}//Class
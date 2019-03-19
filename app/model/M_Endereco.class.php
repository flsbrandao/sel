<?php 
Class M_Endereco extends Model{

	public function cadastro($cep, $endereco, $bairro, $cidade, $estado){

		try{

			$sql = "INSERT INTO tb_endereco (cep,logradouro,bairro,cidade,estado) VALUES (?,?,?,?,?)";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cep);
			$stm->bindValue(2, $endereco);
			$stm->bindValue(3, $bairro);
			$stm->bindValue(4, $cidade);
			$stm->bindValue(5, $estado);
			$stm->execute();

		}catch (PDOException $e){

			echo 'ERRO: ' . $e->getMessage();
		} 
	}// cadastro()

	public function validar_cep($cep){

		try{
			$sql = "SELECT * FROM tb_endereco WHERE cep = ?";
			$stm = $this->pdo->prepare($sql);
			$stm->bindValue(1, $cep);
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
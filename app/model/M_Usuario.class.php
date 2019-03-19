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

		}catch (PDOException $e){

			echo 'ERRO: ' . $e->getMessage();
		} 
	}
}

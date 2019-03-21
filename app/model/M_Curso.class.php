<?php
Class M_Curso extends Model{

	public function adicionar($nome,$inicio,$fim,$horario,$total,$quantidade,$limitar,$categoria,$descricao){

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

			return true;

		}catch(PDOEXception $e){

			echo 'ERRO: ' . $e->getMessage();
			return false;
		}
	}//adicionar()

}//Class
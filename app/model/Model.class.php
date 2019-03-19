<?php
Class Model{

	protected $pdo;

	public function __construct($conexao){
	 	
		$this->pdo = $conexao;
	}
}
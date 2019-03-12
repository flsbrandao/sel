<?php
Class Login extends Controller{

	/*
		Chama a página de login
	*/
	public function index(){
		
		parent::header();
		require_once("app/view/logincadastro/login.php");
		parent::footer();
	}

	public function cadastro(){
		
		parent::header();
		require_once("app/view/logincadastro/cadastro.php");
		parent::footer();
	}

}//Class

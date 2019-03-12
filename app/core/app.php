<?php
Class App{

	/*
		A baixo estão os atributos com valores padrões, caso não acha nada na url
	*/
	protected $controller = "Login";
	protected $method = "index";
	protected $param = [];

	/* 
		Método construtor
	*/
	public function __construct(){

			//Irá verificar se a url é existente, caso não seja, irá carregar a página padrão
			 if(isset($_GET["url"])){

			 	//Chama o método parseUrl() e joga o resultado no array url
				$url = self::parseUrl($_GET["url"]);

			 }else{
			 	$url = explode("/", $this->controller . "/" . $this->method);
			 }

			//Verifica se a pagina controller existe
			if(file_exists("app/controller/" . $url[0] .".class.php")){

				$this->controller = $url[0];
				unset($url[0]);

			}

			//Inclue a página controller e instância um objeto da mesma
			require_once ("app/controller/" . $this->controller . ".class.php");
			$this->controller = new $this->controller;

			//Verifica se existe algo no url[1] (metodo) E se existe esse método na classe
			if(isset($url[1]) && method_exists($this->controller, $url[1])){

				$this->method = $url[1];
				unset($url[1]);
			}

			/* Caso tenha algum valor restante na váriavel url, ele irá atualizar o atributo param. 
				Caso não tenha, ele fica com o valor padrão [] (vazio)
			*/ 
			$this->param = $url ? array_values($url) : [];

			// Chama o objeto da classe, o método e passa o parâmetro
			call_user_func_array([$this->controller, $this->method], $this->param);


	} //construtor

	/*
		O método abairo faz o tratamento da url, separando os atributos (controller,method e param), tirando espaços
		e caracteres especiais
	*/
	private function parseUrl($url){

		return explode("/" ,filter_var(rtrim($url), FILTER_SANITIZE_URL));
	}
}
/*
rtrim - tira todos os espaços encontrados na url
filter_var - elimina todos os carecteres proibidos para url
explode - explode a url usando / como delimitador 

*/
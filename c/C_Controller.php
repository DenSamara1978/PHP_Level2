<?php

abstract class C_Controller
{
	protected abstract function render ( $twig );
	
	protected abstract function before();
	
	public function Request ( $action, $twig )
	{
		$this->before ();
		$this->$action ();   //$this->action_index
		$this->render ( $twig );
	}
	
	protected function isGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	protected function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	public function __call ( $name, $params )
	{
		die ( 'Критическая ошибка!!!<br>Метод: ' . $name . '<br>Параметры: ' . $params . '<br>' );
	}
}

<?php

abstract class C_Controller
{
	protected abstract function render();
	
	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();
		$this->$action();   //$this->action_index
		$this->render();
	}
	
	protected function isGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	protected function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}

	protected function Template($fileName, $vars = array())
	{
		foreach ($vars as $k => $v)
		{
			$$k = $v;
		}

		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
	
	public function __call($name, $params){
		echo $name;
		echo $params;
        die('�� ������ ����� � url-������!!!');
	}
}

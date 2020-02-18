<?php

require_once ( 'm/admin.php' );

class C_Admin extends C_Base
{
	public function action_index ()
	{
		$this->template = "admin.html";
		$this->title .= " | Управление товарами";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ());
	}

	public function action_manager ()
	{
		$this->template = "manager.html";
		$this->title .= " | Управление заказами";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ());
	}
}

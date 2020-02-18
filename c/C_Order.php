<?php

require_once ( 'c/C_Base.php' );

class C_Order extends C_Base
{
	public function action_index ()
	{
		$this->template = "order.html";
		$this->title .= " | Оформление заказа";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ());
	}

	public function action_end ()
	{
		$this->template = "orderEnd.html";
		$this->title .= " | Спасибо за Ваш заказ!";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ());
	}
}


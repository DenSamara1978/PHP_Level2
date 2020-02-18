<?php

require_once ( 'c/C_Base.php' );
require_once ( 'm/goods.php' );
require_once ( 'm/guestbook.php' );

class C_Page extends C_Base
{
	public function action_index ()
	{
		$this->template = "main.html";
		$goods = Goods::getGoods ( $_GET ['page'] ?? 0 );
		$this->title .= " | Каталог";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ( 'goods' => $goods ));
	}

	public function action_good ()
	{
		$this->template = "good.html";
		$good = Goods::getGood ( $_GET ['id'] ?? 0 );
		$this->title .= " | Товар";
		$this->baseParam ();
		$this->param = array_merge ( $this->param , array ( 'good' => $good ));
	}

	public function action_guestbook ()
	{
		$guestbook = new Guestbook ();
		$this->title .= ' | Гостевая книга';
		if ( isset ( $_POST [ 'submit' ] ))
		{
			$fio = trim ( strip_tags ( $_POST ['fio'] ));
			$email = trim ( strip_tags ( $_POST ['email'] ));
			$text = trim ( strip_tags ( $_POST ['text'] ));
		
			$guestbook->newComment ( $fio, $email, $text );
		}
		$comments = $guestbook->getAllComments ();
		$this->template = "guestbook.html";
		$this->baseParam ();
		$this->param = array_merge ( $this->param, array ( 'comments' => $comments ));
	}

	public function action_promo ()
	{
		$this->title .= ' | Акции';
		$this->template = "promo.html";
		$this->baseParam ();
	}

	public function action_contacts ()
	{
		$this->title .= ' | Контакты';
		$this->template = "contacts.html";
		$this->baseParam ();
	}
}

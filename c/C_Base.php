<?php

require_once ( 'c/C_Controller.php' );
require_once ( 'm/user.php' );
require_once ( 'm/basket.php' );

abstract class C_Base extends C_Controller
{
	protected $title;
	protected $template;
	protected $param;
	
	protected function before ()
	{
		$this->title = "Наш интернет-магазин";
	}
	
	public function render ( $twig )
	{
		$this->param ['title'] = $this->title;
		echo $twig->render ( $this->template, $this->param );
	}	

	public function baseParam ()
	{
		$session = isset ( $_SESSION ['user'] );
		if ( $session )
		{
			$user = new User ();
			$userInfo = $user->getUser ( $_SESSION ['user'] );
			$login = $userInfo [ 'login' ];
			$admin = ( $login == 'admin' );
		}
		$basket = new Basket ();
		$goodsCountInBasket = $basket->getGoodsCountInBasket ( $_SESSION ['user'] );
		$this->param = array ( 'session' => $session, 'login' => $login, 'admin' => $admin, 'goodsCountInBasket' => $goodsCountInBasket );
	}
}

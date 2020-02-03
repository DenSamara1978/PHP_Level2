<?php

include_once ( 'm/user.php' );

abstract class C_Base extends C_Controller
{
	protected $title;
	protected $content;

	
	
	protected function before()
	{
		$this->title = 'Название сайта';
		$this->content = '';
	}
	
	public function render()
	{
		$user = new User ();
		if ( isset ( $_SESSION ['user'] ))
		{
			$act1_caption = 'Личный кабинет';
			$act2_caption = 'Выход';
			$act1 = 'index.php?c=user&act=info';
			$act2 = 'index.php?c=user&act=logout';
		}
		else
		{
			$act1_caption = 'Вход';
			$act2_caption = 'Регистрация';
			$act1 = 'index.php?c=user&act=login';
			$act2 = 'index.php?c=user&act=registration';
		}
		echo $this->Template('v/v_main.php', array('title' => $this->title, 'content' => $this->content, 'act1' => $act1, 'act1_caption' => $act1_caption, 'act2' => $act2, 'act2_caption' => $act2_caption ));				
	}	
}

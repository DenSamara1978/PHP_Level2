<?php

include_once('m/User.php');

class C_User extends C_Base
{
	private $user;

	public function __construct ()
	{
		$this->user = new User ();
	}

	public function action_info() 
	{
		$userInfo = $this->user->getUser ( $_SESSION ['user']) ;
		$login = $userInfo ['Login'];
		$this->title .= '::' . $login;
		$this->content = $this->Template('v/v_info.php', array('login' => $login ));
	}
	
	public function action_registration() 
	{
		$this->title .= '::Регистрация';

		if($this->isPost()) 
			$this->content = $this->Template('v/v_registration.php', array('caption' => $this->user->registration ( $_POST['login'], $_POST['password'])));
		else
			$this->content = $this->Template('v/v_registration.php', array());
	}

	public function action_login() 
	{
		$this->title .= '::Вход';

		if($this->isPost()) 
			$this->content = $this->Template('v/v_login.php', array('caption' => $this->user->login ( $_POST['login'], $_POST['password'] )));
		else
			$this->content = $this->Template('v/v_login.php', array());
	}

	public function action_logout() 
	{
		$result = $this->user->logout();
	}
}

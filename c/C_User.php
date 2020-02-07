<?php

require_once ( 'm/User.php' );

class C_User extends C_Base
{
	private $user;

	public function __construct ()
	{
		$this->user = new User ();
	}

	public function action_info() 
	{
		$this->baseParam ();
		$userInfo = $this->user->getUser ( $_SESSION ['user']) ;
		$login = $userInfo ['Login'];
		$this->title .= '::' . $login;
		$this->content = $this->Template('v/v_info.php', array('login' => $login ));
	}
	
	public function action_registration() 
	{
		$this->title .= ' | Регистрация';
		$posted = $this->isPost ();
		$message = $posted ? $this->user->registration ( $_POST ['name'], $_POST ['email'], $_POST ['login'], $_POST['pass'] ) : '';
		$this->template = "registration.html";
		$this->baseParam ();
		$this->param = array_merge ( $this->param, array ( 'posted' => $posted, 'message' => $message ));
	}

	public function action_login() 
	{
		$this->title .= ' | Вход';
		$posted = $this->isPost ();
		$message = $posted ? $this->user->login ( $_POST ['login'], $_POST['pass'] ) : '';
		$this->template = "login.html";
		$this->baseParam ();
		$this->param = array_merge ( $this->param, array ( 'posted' => $posted, 'message' => $message ));
	}

	public function action_logout() 
	{
		$this->user->logout();
		$this->title .= ' | Выход';
		$this->template = "login.html";
		$this->baseParam ();
		$this->param = array_merge ( $this->param, array ( 'posted' => true, 'message' => 'Мы будем рады видеть Вас снова!' ));
	}
}

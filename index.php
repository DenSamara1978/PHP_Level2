<?php
	session_start ();
	
	function __autoload($classname)
	{
		include_once("c/$classname.php");
	}


//site.ru/index.php?act=auth&c=User

$action = 'action_' . ((isset($_GET['act'])) ? $_GET['act'] : 'index' );

$controller = new C_Page ();
if ( isset ( $_GET['c'] ))
{
	switch ($_GET['c'])
	{
	case 'catalog':
		$controller = new C_Catalog();
		break;
	case 'basket':
		$controller = new C_Basket();
		break;
	case 'user':
		$controller = new C_User();
		break;
	}
}

$controller->Request($action);

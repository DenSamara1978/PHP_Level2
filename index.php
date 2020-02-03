<?php
	session_start ();
	
	function __autoload($classname)
	{
		include_once("c/$classname.php");
	}


//site.ru/index.php?act=auth&c=User

$action = 'action_' . ((isset($_GET['act'])) ? $_GET['act'] : 'index' );

if ( isset ( $_GET['c'] ))
{
	switch ($_GET['c'])
	{
	case 'page':
		$controller = new C_Page();
		break;
	case 'user':
		$controller = new C_User();
		break;
	default:
		$controller = new C_Page();
		break;
	}
}
else
	$controller = new C_Page ();

$controller->Request($action);

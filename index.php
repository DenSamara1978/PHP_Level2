<?php
	session_start ();

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register ();

$loader = new Twig_Loader_Filesystem ( 'v' );
$twig = new Twig_Environment ( $loader, array ( 'cache' => 'compilation_cache', 'auto_reload' => true ));

require_once 'c/C_Page.php';
require_once 'c/C_User.php';
require_once 'c/C_Order.php';
require_once 'c/C_Admin.php';


spl_autoload_register ( function ( $class )
{
    include_once ( "c/$class.php" );
});


// index.php?c=page&act=index - Каталог
// index.php?c=page&act=good&id=123 - Карточка товара

// index.php?c=page&act=guestbook - Страница отзывов
// index.php?c=page&act=promo - Страница акций
// index.php?c=page&act=contacts - Страница контактов

// index.php?c=order&act=index - Страница оформления заказа
// index.php?c=order&act=end - Страницы завершения заказа

// index.php?c=user&act=regisrtation - Регистрация покупателя
// index.php?c=user&act=history - Личный кабинет
// index.php?c=user&act=login - Вход покупателя
// index.php?c=user&act=logout - Выход покупателя

$action = 'action_' . ((isset($_GET['act'])) ? $_GET['act'] : 'index' );

$controller = new C_Page ();
if ( isset ( $_GET['c'] ))
{
	if ($_GET['c'] == 'user' )
		$controller = new C_User ();
	else if ($_GET['c'] == 'admin' )
		$controller = new C_Admin ();
	else if ($_GET['c'] == 'order' )
		$controller = new C_Order ();
}

$controller->Request ( $action, $twig );

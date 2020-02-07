<?php
	session_start ();

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register ();

$loader = new Twig_Loader_Filesystem ( 'v' );
$twig = new Twig_Environment ( $loader, array ( 'cache' => 'compilation_cache', 'auto_reload' => true ));

require_once 'c/C_Page.php';
require_once 'c/C_User.php';


spl_autoload_register ( function ( $class )
{
    include_once ( "c/$class.php" );
});


// index.php?c=page&act=index - Первая страница каталог
// index.php?c=page&act=index&page=123 - Конкретная страница каталога
// index.php?c=page&act=good&id=123 - Карточка товара
// index.php?c=page&act=cart - Корзина
// index.php?c=page&act=orders - Заказы
// index.php?c=page&act=order&id=123 - Просмотр заказа

// index.php?c=page&act=guestbook - Страница отзывов
// index.php?c=page&act=promo - Страница акций
// index.php?c=page&act=contacts - Страница контактов

// index.php?c=user&act=regisrtation - Регистрация покупателя
// index.php?c=user&act=login - Вход покупателя
// index.php?c=user&act=logout - Выход покупателя

$action = 'action_' . ((isset($_GET['act'])) ? $_GET['act'] : 'index' );

$controller = new C_Page ();
if ( isset ( $_GET['c'] ))
{
	if ($_GET['c'] == 'user' )
		$controller = new C_User();
}

$controller->Request ( $action, $twig );

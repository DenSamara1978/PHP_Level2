<?php

define ( "DIR_BIG", "img/" );
define ( "DIR_SMALL", "imgMini/" );

require_once ( '../m/goods.php' );
require_once ( '../m/admin.php' );

$admin = new Admin;

if ( isset ( $_POST ['renderAdmin'] ))
{
    $goods = Goods::getGoods ( $_GET ['page'] ?? 0 );
    echo json_encode ( $goods );
    exit;
}

if ( isset ( $_POST ['deleteGoodId'] ))
{
    Goods::deleteGood ( $_POST ['deleteGoodId'] );
    echo ( true );
    exit;
}

if ( isset ( $_POST ['addNewGood'] ))
{
	Goods::addNewGood ();
    echo ( true );
    exit;
}

if ( isset ( $_POST ['edit'] ))
{
	$id = trim ( strip_tags ( $_POST ['id'] ));
	$nameFull = trim ( strip_tags ( $_POST ['nameFull'] ));
    $nameShort = Goods::translit ( trim ( strip_tags ( $_POST ['nameFull'] )));
    $param = strip_tags ( $_POST ['param'] );
    $price = ( int ) trim ( strip_tags ( $_POST ['price'] ));
    $weight = ( int ) trim ( strip_tags ( $_POST ['weight'] ));
    $discount = ( int ) trim ( strip_tags ( $_POST ['discount'] ));
	if ( $_POST ['stickerFit'] == 'on')
		$stickerFit = '1';
	else
		$stickerFit = '0';
    if ( $_POST ['stickerHit'] == 'on' )
		$stickerHit = '1';
	else
		$stickerHit = '0';
    $filePath = $_FILES ['userfile']['tmp_name'];
    $fileName = Goods::translit ( $_FILES ['userfile']['name']);
    $type = $_FILES ['userfile']['type'];
    $size = $_FILES ['userfile']['size'];
    $respType = 0;
    if ( $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif' ) 
    {
        if ( $size > 0 and $size < 1000000 ) 
        {
            if ( copy ( $filePath, '../' . DIR_BIG . $fileName ))
            {
                $type = explode ( '../', $_FILES ['userfile']['type'] )[1];
                Goods::changeImage ( 220, 117, '../' . DIR_BIG . $fileName, '../' . DIR_SMALL . $fileName, $type );
                $id = ( int ) trim ( strip_tags ( $_POST ['id'] ));
                Goods::goodEdit ( $id, $nameShort, $nameFull, $price, $param, DIR_BIG . $fileName, DIR_SMALL . $fileName, $weight, $discount, $stickerFit, $stickerHit );
                $message = "Файл успешно загружен на сервер.";
                $respType = 1;
            }
            else
                $message = "Ошибка!\nНе удалось загрузить файл на сервер!";
        }
        else
            $message = "Ошибка!\nкартинка превышает 1 Мб.";
    } 
    else
        $message = "Картинка не подходит по типу!\nКартинка должна быть в формате JPEG, PNG или GIF.";
    $response = array ( 'response' => $message, 'type' => $respType );
    echo json_encode ( $response );
    exit;
}

if ( isset ( $_POST ['renderManager'] ))
{
	$orderFullInfo = $admin->getOrdersToManager ();
    echo json_encode ( $orderFullInfo );
    exit;
};

if ( isset ( $_POST ['renderOrderToManager'] ))
{
    $order = $admin->getOrderToManager ( $_POST ['renderOrderToManager'] );
    echo json_encode ( $order );
    exit;
}

?>

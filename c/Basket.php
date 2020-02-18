<?php

session_start ();

require_once ( '../m/basket.php' );
require_once ( '../m/admin.php' );

$basket = new Basket;

if ( isset ( $_POST ['addToBasketId'] ))
{
    $goodId = $_POST ['addToBasketId'];
    $userId = $_SESSION ['user'];
	
    $basket->addGoodToBasket ( $userId, $goodId );

    $goodsCountInBasket = $basket->getGoodsCountInBasket ( $userId );
    $sumGoodsOrder = 1;
    $row = $basket->getGoodCountAndSumInBasket ( $userId, $goodId );
    $theGoodCountInBasket = $row ['count'];
    $theGoodSumInBasket = $row ['sum'];
    $totalSumInBasket = $basket->getTotalSumInBasket ( $userId );
    $sumGoodsOrderDiscount = 1;

    echo json_encode ( array ( $goodsCountInBasket, $sumGoodsOrder, $theGoodCountInBasket, $theGoodSumInBasket, $totalSumInBasket, $sumGoodsOrderDiscount ));
    exit;
}

if ( isset ( $_POST ['deleteFromBasketId'] ))
{
    $goodId = $_POST ['deleteFromBasketId'];
    $userId = $_SESSION ['user'];

    $basket->deleteGoodFromBasket ( $userId, $goodId );
    
    $goodsCountInBasket = $basket->getGoodsCountInBasket ( $userId );
    $sumGoodsOrder = 1;
    $row = $basket->getGoodCountAndSumInBasket ( $userId, $goodId );
    $theGoodCountInBasket = $row ['count'];
    $theGoodSumInBasket = $row ['sum'];
    $totalSumInBasket = $basket->getTotalSumInBasket ( $userId );
    $sumGoodsOrderDiscount = 1;

    echo json_encode ( array ( $goodsCountInBasket, $sumGoodsOrder, $theGoodCountInBasket, $theGoodSumInBasket, $totalSumInBasket, $sumGoodsOrderDiscount ));
    exit;
}

if ( isset ( $_POST ['getBasketGoods'] ))
{
    echo json_encode ( $basket->getWholeBasket ( $_SESSION ['user'] ));
    exit;
}

if ( isset ( $_POST ['renderBasket'] ))
{
    $goodBasket = $basket->getWholeBasket ( $_SESSION ['user'] );
    echo json_encode ( $goodBasket );
    exit;
}

if ( isset ( $_POST ['pay'] ))
{
	$timeOrder = time ();	
    $userId = $_SESSION ['user'];
    $name = $_POST ['name'];
	$phone = $_POST ['phone'];
	$discountCard = $_POST ['discountCard'];
	$persons = $_POST ['persons'];
	$pay = $_POST ['pay'];
	$money = $_POST ['money'];
	$address = $_POST ['address'];
	$comment = $_POST ['comment'];
	$delivery = $_POST ['delivery'];
    $desiredTime = $_POST ['desiredTime'];
    $payAmount = $_POST ['payAmount'];
    
    $basket->makeOrder ( $userId, $timeOrder, $name, $phone, $discountCard, $payAmount, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime );

    echo json_encode ( $_POST );
    exit;
};
	 
if ( isset ( $_POST ['renderOrder'] ))
{
	$orderFullInfo = $basket->getOrderInfo ( $_SESSION ['user'] );
	
    echo json_encode ( $orderFullInfo );
    exit;
};

require_once ( '../m/user.php' );

$user = new User;

if ( isset ( $_POST ['renderHistory'] ))
{
	$orderFullInfo = $user->getUserOrders ( $_SESSION ['user'] );
    echo json_encode ( $orderFullInfo );
    exit;
};

if ( isset ( $_POST ['renderOrderFromHistory'] ))
{
    $order = $user->getUserOrder ( $_SESSION ['user'], $_POST ['renderOrderFromHistory'] );
    echo json_encode ( $order );
    exit;
}

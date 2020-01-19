<?php

include "DigitalGoods.php";
include "PieceGoods.php";
include "WeightGoods.php";

include "Session.php";

$digital = new DigitalGoods ( "Windows 10 Pro", 2000.0 );
$amount = 3;
echo $digital->getInfo () . "<br>";
echo "Стоимость товара в количестве " . $amount . " составляет " . $digital->calculatePrice ( $amount ) . "<br><br>";

$piece = new PieceGoods ( "Pentium-100", 200.0 );
$amount = 3;
echo $piece->getInfo () . "<br>";
echo "Стоимость товара в количестве " . $amount . " составляет " . $piece->calculatePrice ( $amount ) . "<br><br>";

$weight = new WeightGoods ( "Thermal Paste", 3000.0 );
$amount = 0.02;
echo $weight->getInfo () . "<br>";
echo "Стоимость товара в количестве " . $amount . " составляет " . $weight->calculatePrice ( $amount ) . "<br><br>";

$session1 = Session::getInstance (); // Установка сессии - генерация Singleton
$session2 = Session::getInstance (); // Новый переменная сессии, но будет использован тот-же самый Singleton-объект

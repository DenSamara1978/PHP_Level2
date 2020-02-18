<?php

require_once ( 'db.php' );

class Basket 
{		
    public function getWholeBasket ( $userId ) 
    {
        return DB::getRows ( 'SELECT basket.count AS count, goods.price AS price, goods.discount AS discount, goods.nameFull AS nameFull, goods.id AS id FROM basket INNER JOIN goods ON basket.good_id=goods.id WHERE user_id = :user_id AND basket.order_id IS NULL', array ( 'user_id' => $userId ));
    }
    
    public function addGoodToBasket ( $userId, $goodId )
    {
        $row = DB::getRow ( 'SELECT count FROM basket WHERE user_id=:user_id AND good_id=:good_id AND basket.order_id IS NULL', array ( 'user_id' => $userId, 'good_id' => $goodId ));
        if ( $row )
        {
            $count = $row ['count'] + 1;
            DB::update ( 'UPDATE basket SET count=:count WHERE user_id=:user_id AND good_id=:good_id AND basket.order_id IS NULL', array ( 'user_id' => $userId, 'good_id' => $goodId, 'count' => $count ));
        }
        else
            DB::insert ( 'INSERT INTO basket ( user_id, good_id, count ) VALUES ( :user_id, :good_id, 1 )', array ( 'user_id' => $userId, 'good_id' => $goodId ));
    }

    public function deleteGoodFromBasket ( $userId, $goodId )
    {
        $row = DB::getRow ( 'SELECT count FROM basket WHERE user_id=:user_id AND good_id=:good_id AND order_id IS NULL', array ( 'user_id' => $userId, 'good_id' => $goodId ));
        if ( $row )
        {
            $count = $row ['count'] - 1;
            if ( $count == 0 )
                DB::delete ( 'DELETE FROM basket WHERE user_id=:user_id AND good_id=:good_id AND order_id IS NULL', array ( 'user_id' => $userId, 'good_id' => $goodId ));
            else
                DB::update ( 'UPDATE basket SET count=:count WHERE user_id=:user_id AND good_id=:good_id AND order_id IS NULL', array ( 'user_id' => $userId, 'good_id' => $goodId, 'count' => $count ));
        }
    }

    public function getGoodsCountInBasket ( $userId )
    {
        $row = DB::getRow ( "SELECT sum(count) AS count FROM basket WHERE user_id=:user_id AND order_id IS NULL", array ( 'user_id' => $userId ));
        return $row ['count'];
    }

    public function getGoodCountAndSumInBasket ( $userId, $good_id )
    {
        $row = DB::getRow ( "SELECT basket.count AS count, (basket.count * goods.price) AS sum FROM basket INNER JOIN goods ON basket.good_id=goods.id WHERE good_id=:good_id AND user_id=:user_id AND order_id IS NULL", array ( 'user_id' => $userId, 'good_id' => $good_id ));
        return $row;
    }

    public function getTotalSumInBasket ( $userId )
    {
        $row = DB::getRow ( "SELECT sum(basket.count * goods.price) AS sum FROM basket INNER JOIN goods ON basket.good_id=goods.id WHERE user_id=:user_id AND order_id IS NULL", array ( 'user_id' => $userId ));
        return $row ['sum'];
    }

    public function getClientInfoAll ( $userId )
    {
        return DB::getRow ( "SELECT * FROM users WHERE id=:id", array ( 'id' => $userId ));
    }
    
    public function makeOrder ( $userId, $timeOrder, $name, $phone, $discountCard, $payAmount, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime )
    {
        $param = array ( 'user_id' => $userId, 'timeOrder' => $timeOrder, 'name' => $name, 'phone' => $phone, 'discountCard' => $discountCard, 'persons' => $persons, 
                            'pay' => $pay, 'money' => $money, 'address' => $address, 'comment' => $comment, 'delivery' => $delivery, 'desiredTime' => $desiredTime, 'payAmount' => $payAmount );
        DB::insert ( "INSERT INTO orders ( user_id, timeOrder, name, phone, discountCard, payAmount, persons, pay, money, address, comment, delivery, desiredTime, status ) VALUES ( :user_id, :timeOrder, :name, :phone, :discountCard, :payAmount, :persons, :pay, :money, :address, :comment, :delivery, :desiredTime, 1 )", $param );
        $row = DB::getRow ( "SELECT MAX(id) AS id FROM orders WHERE user_id=:user_id", array ( 'user_id' => $userId ));
        $orderId = $row ['id'];
        DB::update ( "UPDATE basket SET order_id=:order_id WHERE user_id=:user_id AND order_id IS NULL", array ( 'user_id' => $userId, 'order_id' => $orderId ));
    }

    public function getOrderInfo ( $userId )
    {
        $row = DB::getRow ( 'SELECT MAX(id) AS id FROM orders WHERE user_id=:user_id', array ( 'user_id' => $userId ));
        $orderId = $row ['id'];
        return DB::getRows ( 'SELECT * FROM basket INNER JOIN orders ON basket.order_id=orders.id INNER JOIN goods ON basket.good_id=goods.id INNER JOIN users ON orders.user_id=users.id WHERE orders.user_id=:user_id AND orders.id=:order_id', array ( 'user_id' => $userId, 'order_id' => $orderId ));
    }
}

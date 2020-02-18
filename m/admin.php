<?php

require_once ( 'db.php' );

class Admin 
{		
    public function getOrdersToManager ()
    {
        return DB::getRows ( 'SELECT * FROM orders', array ());
    }

    public function getOrderToManager ( $orderId )
    {
        return DB::getRows ( 'SELECT basket.count AS count, goods.discount AS discount, goods.price AS price, goods.nameFull AS nameFull, 
                                goods.id AS id, orders.timeOrder AS timeOrder, orders.delivery AS delivery 
                              FROM basket INNER JOIN goods ON goods.id=basket.good_id INNER JOIN orders ON orders.id=basket.order_id 
                              WHERE orders.id=:order_id', array ( 'order_id' => $orderId ));
    }
}

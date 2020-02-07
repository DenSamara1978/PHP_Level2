<?

include_once ( 'db.php' );

class Goods 
{		
    public static function getGoods ( $page )
    {
        return DB::getRows ( "SELECT * FROM goods", array ());
    }

    public static function getGood ( $id )
    {
        return DB::getRow ( "SELECT * FROM goods WHERE id=:id", array ( 'id' => $id ));
    }

    public static function countGoodsOrder ()
    {
        $row = DB::getRow ( "SELECT sum(`count`) AS count FROM `basket`" );
        return $row ['count'];
    }
}

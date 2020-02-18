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

    public static function deleteGood ( $id )
    {
        DB::delete ( "DELETE FROM goods WHERE id=:id", array ( 'id' => $id ));
    }

    public static function addNewGood ()
    {
        DB::insert ( "INSERT INTO goods VALUES ()" );
    }

    public static function goodEdit ( $id, $nameShort, $nameFull, $price, $param, $fileNameFull, $fileNameSmall, $weight, $discount, $stickerFit, $stickerHit )
    {
        DB::update ( "UPDATE goods SET nameShort=:nameShort, nameFull=:nameFull, price=:price, param=:param, bigPhoto=:fileNameFull, miniPhoto=:fileNameSmall,
                            weight=:weight, discount=:discount, stickerFit=:stickerFit, stickerHit=:stickerHit WHERE id=:id", 
                        array ( 'id' => $id, 'nameShort' =>  $nameShort, 'nameFull' =>  $nameFull, 'price' =>  $price,
                                'param' =>  $param, 'fileNameFull' =>  $fileNameFull, 'fileNameSmall' =>  $fileNameSmall,
                                'weight' =>  $weight, 'discount' =>  $discount, 'stickerFit' =>  $stickerFit, 'stickerHit' => $stickerHit ));
    }

    public static function translit ( $string )
    {
        $translit = array (
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya' );
    
        return str_replace ( ' ', '_', strtr ( mb_strtolower ( $string, 'utf-8' ) , $translit ));
    }
    
    public static function changeImage ( $h, $w, $src, $newsrc, $type )
    {
        $newimg = imagecreatetruecolor ( $h, $w );
        switch ( $type ) 
        {
            case 'jpeg':
                $img = imagecreatefromjpeg ( $src );
                imagecopyresampled ( $newimg, $img, 0, 0, 0, 0, $h, $w, imagesx ( $img ), imagesy ( $img ));
                imagejpeg ( $newimg, $newsrc );
                break;
            case 'png':
                $img = imagecreatefrompng ( $src );
                imagecopyresampled ( $newimg, $img, 0, 0, 0, 0, $h, $w, imagesx ( $img ), imagesy ( $img ));
                imagepng ( $newimg, $newsrc );
                break;
            case 'gif':
                $img = imagecreatefromgif ( $src );
                imagecopyresampled ( $newimg, $img, 0, 0, 0, 0, $h, $w, imagesx ( $img ), imagesy ( $img ));
                imagegif ( $newimg, $newsrc );
                break;
        }
    }
    
    }


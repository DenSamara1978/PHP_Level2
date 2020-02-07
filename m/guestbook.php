<?

require_once ( 'db.php' );

class Guestbook
{		
    public function newComment ( $fio, $email, $text ) 
    {
        DB::insert ( 'INSERT INTO comment VALUES ( null, :fio, :email, :text )', array ( 'fio' =>$fio, 'email' => $email, 'text' => $text ));
	}

    public function getAllComments () 
    {
        return DB::getRows ( 'SELECT * FROM comment', array ());
	}
}

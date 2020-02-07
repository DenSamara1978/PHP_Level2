<?

require_once ( 'db.php' );

class User 
{		
    public function registration ( $name, $email, $login, $password) 
    {
        $user = DB::getRow ( 'SELECT * FROM users WHERE Login = :login', array ( 'login' => $login ));
        if ( !$user ) 
        {
            $pass = $this->passwordField($login, strip_tags ( $password));
            DB::insert ( 'INSERT INTO users VALUES ( null, :name, :email, :login, :pass )', array ( 'name' =>$name, 'email' => $email, 'login' => $login, 'pass' => $pass ));
			return 'Вы зарегистрированы в системе, ' . $login . '!';
        }
        return 'Пользователь с таким логином уже зарегистрирован!';
	}

    public function login ($login, $password) 
    {
        $user = DB::getRow ( 'SELECT * FROM users WHERE Login = :login', array ( 'login' => $login ));
        if ( $user ) 
        {
            $pass = $this->passwordField ( $login, strip_tags ( $password ));
            if ( $user ['pass'] == $pass ) 
            {
                $_SESSION ['user'] = $user ['id'];
   				return 'Добро пожаловать в систему, ' . $login . '!';
            }
    		return 'Пароль не верный!';
        }
   		return 'Пользователь с таким логином не зарегистрирован!';
	}

    public function logout () 
    {
        if (isset($_SESSION['user'])) 
        {
			$_SESSION ['user'] = null;
    		session_destroy();
			return true;
		} 
		return false;
	}
    
    public function passwordField ( $login, $password ) 
    {
		return strrev ( md5 ( $login) . md5 ( $password ));
    }

    public function getUser ($id) 
    {
		return DB::getRow ( "SELECT * FROM users WHERE id = :id", array ( 'id' => $id ));
    }
}

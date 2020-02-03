<?
class User 
{		
    public $connection;

    public function __construct () 
    {
        $this->connection = new PDO ( "mysql:host=localhost;dbname=php_lvl2_les05", "root", "" );
	}

    public function registration ($login, $password) 
    {
        $user = $this->connection->query("SELECT * FROM Users WHERE Login = '$login'" )->fetch();
        if (!$user) 
        {
            $pass = $this->passwordField($login, strip_tags ( $password));
    		$this->connection->exec("INSERT INTO Users VALUES (null, '$login', '$pass')");
			return 'Вы зарегистрированы в системе, ' . $login . '!';
        }
        return 'Пользователь с таким логином уже зарегистрирован!';
	}

    public function login ($login, $password) 
    {
    	$user = $this->connection->query("SELECT * FROM Users WHERE Login = '$login'" )->fetch();
        if ($user) 
        {
            $pass = $this->passwordField($login, strip_tags ( $password ));
            if ( $user['Password'] == $pass ) 
            {
                $_SESSION['user'] = $user['Id'];
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
			$_SESSION['user'] = null;
    		session_destroy();
			return true;
		} 
		return false;
	}
    
    public function passwordField ($login, $password) 
    {
		return strrev(md5($login) . md5($password));
    }

    public function getUser ($id) 
    {
		return $this->connection->query("SELECT * FROM Users WHERE Id = $id")->fetch();
    }
}

<?php 
class user{
	public $host = "localhost";
	public $username = "wbd";
	public $password = "12345678";
	public $database = "wbd";
	public $connection;
 
	function __construct(){
		$this->connection = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 
 
	function register($username,$email,$password)
	{	
		$insert = mysqli_query($this->connection,"insert into user values ('$username','$email','$password','0')");
		return $insert;
	}
 
	function login($username,$password)
	{
		$query = "select * from user where username='$username'";
		$result = $this->connection->query($query);
		if(!is_null($result)){
			echo "halo";

			if(strcmp($password,$user['password']))
			{
			setcookie('username', $username, time() + (86400 * 30), '/');
				
			return TRUE;
		}
			} else {
				echo "gaada";
				return FALSE;
		}
		

		
	}

	function relogin($username){
		$query = mysqli_query($this->connection,"select * from user where username='$username'");
		setcookie('username', $username, time() + (86400 * 30), '/');
				
		$_SESSION['username'] = $username;
		return TRUE;
	}
	
} 

?>
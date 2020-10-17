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
		$result = $this->connection->query("select * from user where username='$username' and password='$password'");
		if($result->num_rows >0){

			
			setcookie('username', $username, time() + (86400 * 30), '/');
			
			return TRUE;
		} else {
				return FALSE;
		}
		

		
	}

	function relogin($username){
		$query = mysqli_query($this->connection,"select * from user where username='$username'");
		setcookie('username', $username, time() + (86400 * 30), '/');
				
		$_SESSION['username'] = $username;
		return TRUE;
	}
	function checkUsername($username){
		$result = $this->connection->query("select * from user where username='$username'");
		if ($result->num_rows===0){
			return TRUE;
		} else{
			return FALSE;
		}

	}

	function checkEmail($email){
		$result = $this->connection->query("select * from user where email='$email'");
		if ($result->num_rows===0){
			return TRUE;
		} else{
			return FALSE;
		}
	}
	
} 

?>
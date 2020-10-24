<?php 
class database{
	public $host = "localhost";
	// default username to connect database with xampp
	public $username = "root";
	// default password to connect database with xampp
	public $password = "";
	public $database = "wbd";
	public $connection;
 
	function __construct(){
		$this->connection = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 

	// USER 

	function generateCookie($length = 10) {
		$char = '0123456789asqwedrftghyujkiolpzxcvbnm,.;[]./]=-@#$%^&*!~"';
		$random ='';


		for ($i = 0; $i<$length;$i++){
			$id = rand(0, strlen($char) -1);
			$random .= $char[$id];
		}
		return $random;
	}

	function register($username,$email,$password)
	{	
		$result = $this->connection->query("insert into user values ('$username','$email','$password','0',NULL)");

		return $result;
	}
 
	function login($username,$password)
	{
		$result = $this->connection->query("select * from user where username='$username' and password='$password'");
		if($result->num_rows >0){
			while (True){
				$cookie = $this->generateCookie();
				$query = mysqli_query($this->connection,"update user set cookie='$cookie' where username='$username'");
				if (query){
					break;
				} else {
					continue;
				}
			}
			
			$row =$result->fetch_assoc();
			if($row["superuser"] == 1){
				setcookie('superuser',1,time() + (86400 * 30), '/' );
			}

			setcookie('username', $cookie, time() + (86400 * 30), '/');

			return TRUE;
		} else {
				return FALSE;
		}
		

		
	}

	
	function relogin($cookie){

		$result = $this->connection->query("select * from user where cookie='$cookie'");

		if ($result->num_rows > 0){

			setcookie('username', $cookie, time() + (86400 * 30), '/');
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	function logout($cookie){
		$sql =  mysqli_query($this->connection,"update user set cookie=NULL where cookie='$cookie'");
		if($sql){
			return TRUE;
		} else{
			return FALSE;
		}
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

	// CHOCOLATE
	function countId(){
		$result = $this->connection->query("select * from product");
		$id = $result->num_rows + 1;
		return $id;
	}
	function addChocolate($name,$price,$amount,$desc,$path){
		$query = mysqli_query($this->connection,"insert into product values (NULL,'$name',0,'$price','$amount','$desc','$path')");
		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	function getDataChocolate($keysearch_name){
		$result = $this->connection->query("select * from product where name like '%$keysearch_name%'");
		return $result;
	}

	function getHistory($username){
		$result = $this->connection->query("select productID, name, amount, total, timestamp, address from transaction, product where username = '$username' and id = productID");
		return $result;
	}


	
} 

?>
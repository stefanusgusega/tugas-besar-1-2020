<?php
	include 'database.php';

	$username = $_POST['username'];
    $password = $_POST['password'];

    $user_db = new database();
    if ($user_db->login($username,$password)){

    	header('location:/homepage');
    } else{

    	setcookie('login', '2', time() +  (3000), '/');

   		header('location:/login');
    }
   
?>
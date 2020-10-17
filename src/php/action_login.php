<?php
	include 'user.php';

	$username = $_POST['username'];
    $password = $_POST['password'];

    $user_db = new user();
    if ($user_db->login($username,$password)){

    	header('location:homepage.php');
    } else{

    	setcookie('login', '2', time() +  (3000), '/');

   		header('location:login.php');
    }
   
?>
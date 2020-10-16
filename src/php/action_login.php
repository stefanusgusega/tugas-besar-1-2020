<?php
	include 'user.php';

	$username = $_POST['username'];
    $password = $_POST['password'];

    $user_db = new user();
    if ($user_db->login($username,$password)){

    	header('location:homepage.php');
    } else{
    	echo  "<div style='margin: auto 0; text-align:center;'><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Email or username does not match<br><br><a href='register.php'>Click here to register page.</a><br><a href='login.php'>Try to login again?</a></div>";
    }
   
?>
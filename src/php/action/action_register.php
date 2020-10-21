<?php
	include 'database.php';
	$username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $confirmation = $_POST['confpassword'];
    $uname = $_POST['uname'];
    $em = $_POST['em'];
   	$user_db = new database();

    if (is_null($uname) && is_null($em)){

	    if($user_db->register($username,$email,$password)){
	    	setcookie('login', '3', time() +  (3000), '/');

	   		header('location:/login');
	    
	    } else {
            header('location:/register');
        }
    } else if (!is_null($uname)){

    	if ($user_db->checkUsername($uname)){
    		echo 1;
    	} else{
    		echo 0;
    	}

    } else {
    	if ($user_db->checkEmail($em)){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }
    
    
?>


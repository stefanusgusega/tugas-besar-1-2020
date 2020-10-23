<?php
	include 'database.php';
	// $username = $_POST['username'];
	// $email = $_POST['email'];
 //    $password = $_POST['password'];
 //    $confirmation = $_POST['confpassword'];
 //    $uname = $_POST['uname'];
 //    $em = $_POST['em'];
   	$user_db = new database();
    $boolean = $_POST['boolean'];

    if ($boolean == "0"){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmation = $_POST['confpassword'];

	    if($user_db->register($username,$email,$password)){
	    	setcookie('login', '3', time() +  (3000), '/');

	   		header('location:/login');
	    
	    } else {
            header('location:/register');
        }
    } else if ($boolean == "1"){
        $uname =  $_POST['username'];

    	if ($user_db->checkUsername($uname)){
    		echo 1;
    	} else{
    		echo 0;
    	}

    } else {
        $em = $_POST['email'];

    	if ($user_db->checkEmail($em)){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }
    
    
?>


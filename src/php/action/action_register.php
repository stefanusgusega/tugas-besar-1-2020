<?php
	include_once 'database.php';
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmation = isset($_POST['confpassword']) ? $_POST['confpassword'] : '';
    $uname = isset($_POST['uname']) ? $_POST['uname'] : '';
    $em = isset($_POST['em']) ? $_POST['em'] : '';
   	$user_db = new database();

    if (!($uname) && !($em)){

	    if($user_db->register($username,$email,$password)){
	    	setcookie('login', '3', time() +  (3000), '/');

	   		header('location:/login');
	    
	    } else {
            header('location:/register');
        }
    } else if (($uname)){

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


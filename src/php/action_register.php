<?php
	include 'user.php';

	# Take register info
	$username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $confirmation = $_POST['confpassword'];

    if (!$password.strcmp($confirmation)) {
    	alert("password tidak sama");
    }
    $user_db = new user();

    if($user_db->register($username,$email,$password)){
    	echo "<div style='margin: auto 0; text-align:center;'><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Register completed!<br><br><a href='register.php'>Login to access the page</a></div>";
    } else {
    	echo "<div style='margin: auto 0; text-align:center;'><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>Email or username already exists<br><br><a href='register.php'>Click here to return to the register page.</a><br><a href='login.php'>Try a shot?</a></div>";
    }
?>


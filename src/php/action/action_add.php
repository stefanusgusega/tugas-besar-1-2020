<?php
	include 'database.php';
	$name = $_POST['name'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$desc = $_POST['desc'];

	$file_path = '../../../assets/images/';
	$filetype = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));

	$product_db = new database();
	$id = $product_db->countId();
	$path = $id . '.' . $filetype;
	$filename = $product_db->addChocolate($name,$price,$amount,$desc,$path);
	if ( $filename != false) {
		$fullpath = $file_path . $path;
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $fullpath)) {
   	 	setcookie('add', '1', time() +  (3000), '/');

   	 	header("location:../addChocolate.php");
	  	} else {
			setcookie('add', '0', time() +  (3000), '/');

	    	header("location:../addChocolate.php");
	  	}
	} else {
		setcookie('add', '2', time() +  (3000), '/');
	    	header("location:../addChocolate.php");
	}
  	

?>
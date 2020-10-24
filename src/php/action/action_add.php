<?php
	include 'database.php';
	$name = $_POST['name'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$desc = $_POST['desc'];

	$file_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/';
	$filetype = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));

	$product_db = new database();
	$id = $product_db->countId();
	$path = $id . '.' . $filetype;
	$fullpath = $file_path . $path;
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $fullpath)) {
		
		if ($filename = $product_db->addChocolate($name,$price,$amount,$desc,$path)) {
   	 	setcookie('add', '1', time() +  (3000), '/');

   	 	header("location:/add");
	  	} else {
			setcookie('add', '0', time() +  (3000), '/');

	    	header("location:/add");
	  	}
	} else {
		setcookie('add', '2', time() +  (3000), '/');
	    	header("location:/add");
	}
  	

?>
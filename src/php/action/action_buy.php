<?php
	include_once 'database.php';
	$id = $_POST['id'];
	$stock = $_POST['stock'];
    $transactionID
    $productID
    $username
    $amount
    $total
    $timestamp
    $address
	
	$db = new database();
	if ($db->buyItem($transactionID,$productID,$username,$amount,$total,$timestamp,$address)){
		echo TRUE;
	} else{
		echo FALSE;
	}
  	

?>
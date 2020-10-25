<?php
	include_once 'database.php';
	$id = $_POST['id'];
	$stock = $_POST['stock'];
	
	
	$db = new database();
	if ($db->addStock($id,$stock)){
		echo TRUE;
	} else{
		echo FALSE;
	}
  	

?>
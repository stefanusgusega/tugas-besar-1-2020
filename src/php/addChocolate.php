<?php
	if(!isset($_COOKIE['superuser'])){
		header('location:/homepage');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="src/css/app.css">
	<link rel="stylesheet" href="src/css/form.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Add Chocolate</title>
</head>
<body>
	  <?php include_once 'src/php/template/navbar.php'?>

 	<br>
 	<div class="center-screen">

 	<div class="title" id="request" >
 		Add New Chocolate
 	</div>
 	<div class="form">
 		<form action="src/php/action/action_add.php" method="post"  enctype="multipart/form-data" onsubmit="return validateFile()">
 			<input type="text" id="name" name="name" placeholder="Chocolate Name"required>
 			<input type="number" id="price" name="price" placeholder="Price" min=0 required>
 			<input type="number" id="amount" name="amount" placeholder="Amount" min=0 required>
 			<textarea id="desc" name="desc" placeholder="Description" required></textarea>
 			<div style="text-align: center">
 				<label class="custom-file-upload">
			    <input type="file" id="file" name="file" onchange="return uploadFile()" accept=".jpg,.png,.jpeg"  required>
			    Image Upload
				</label>
				<div class="infos" id="info">
					Only .jpg and .png file allowed.
				</div>
 			</div>
 			<br>
 			<input type="submit" value="Add">
 			

 		</form>
 	</div>
 </div>

	
</body>

<script type="text/javascript">
	<?php
	 if ($_COOKIE['superuser']==1) {
        echo 'document.getElementById("add").innerHTML = "Add Chocolate";';
        echo 'document.getElementById("add").href = "/add";';
        echo 'document.getElementById("history").style.display = "none";';
      }
      else{
        echo 'document.getElementById("history").innerHTML = "History";';
        echo 'document.getElementById("history").href = "/history";';
        echo 'document.getElementById("add").style.display = "none";';
      }
     ?>
	window.onload = function() {

		<?php


		if (($_COOKIE['superuser'])==1){
		  echo 'document.getElementById("addChocolate").innerHTML = "Add Chocolate"';
		}

		?>
	}

	function getFilename(fullpath){
	    var filename = fullpath.split(/(\\|\/)/g).pop()
	    return filename;

		
	}

	function uploadFile(){
		var path = document.getElementById("file").value;
		var filename = getFilename(path);
		document.getElementById("info").innerHTML = filename;
	}

	function validateFile(){
		var path = document.getElementById("file").value;
		var filename = getFilename(path);
		var ext = filename.split('.')[1];
		if (ext != "jpg" && ext != "png" && ext !="jpeg"){
			alert("File is not supported");
			location.reload();
			return false;
		}
	}
	<?php
		if (isset($_COOKIE['add'])){
			if ($_COOKIE['add'] == '0' || $_COOKIE['add'] == 2){
				echo 'document.getElementById("request").innerHTML = "Adding Failed"';
		    } else if($_COOKIE['add'] == '1'){
				echo 'document.getElementById("request").innerHTML = "New Chocolate Added"';
		    } 
		    setcookie('add', '',0, '/');
		}

	?>

	
</script>
</html>
<?php
	if(!isset($_COOKIE['superuser'])){
		header('location:login.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="..//css/form.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Add Chocolate</title>
</head>
<body>
	<div id="navbar">
 	</div>
 	<br>
 	<div class="center-screen">

 	<div class="title" id="request" >
 		Add New Chocolate
 	</div>
 	<div class="form">
 		<form action="../php/action/action_add.php" method="post"  enctype="multipart/form-data" onsubmit="return validateFile()">
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
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
	    if (xhttp.readyState == 4 && xhttp.status == 200){
	        document.getElementById("navbar").innerHTML += xhttp.responseText;
	    }
	};
	xhttp.open('GET', '../html/navbar.html', true); // note: link the footer.html
	xhttp.send();
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
			if ($_COOKIE['add'] == '0'){
				echo 'document.getElementById("request").innerHTML = "Adding Failed"';
		    } else if($_COOKIE['add'] == '1'){
				echo 'document.getElementById("request").innerHTML = "New Chocolate Added"';
		    } 
		    setcookie('add', '',0, '/');
		}

	?>

	
</script>
</html>
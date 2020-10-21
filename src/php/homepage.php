<?php
  include './action/database.php';
  if(!isset($_COOKIE['username'])) {
    setcookie('login', '1', time() +  (3000), '/');

    header('location:/login');
  } else {
    $user_db = new database();
    if(!$user_db->relogin($_COOKIE['username'])){
      header('location:/login');
    }
  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="src/css/user.css">
    <link rel="stylesheet" href="src/css/app.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
  <div id="navbar">
  </div>
</body>
<script type="text/javascript">
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
      if (xhttp.readyState == 4 && xhttp.status == 200){
          document.getElementById("navbar").innerHTML += xhttp.responseText;
      }
  };
  xhttp.open('GET', 'src/html/navbar.html', true); // note: link the footer.html
  xhttp.send();
  window.onload = function() {

    <?php


    if (($_COOKIE['superuser'])==1){
      echo 'document.getElementById("addChocolate").innerHTML = "Add Chocolate"';
    }

    ?>
  }

</script>
</html>
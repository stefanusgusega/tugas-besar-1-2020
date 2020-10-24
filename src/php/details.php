<?php
// include_once 'src/php/action/database.php';
include_once 'src/php/action/database.php'; // root nya jd details.php
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
    <link rel="stylesheet" href="/src/css/app.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
  <?php //include_once 'src/php/template/navbar.php'?>
  <?php include_once 'src/php/template/navbar.php'?>
  <br><br><br>
  <div class="after-navbar-body">
    <div id = "details-name">
      
    </div>
    
  </div>

</body>
<script type="text/javascript">

  window.onload = function() {
    <?php
      include_once 'src/php/action/database.php';
      // include_once './action/database.php';
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
      $db = new database();
      $id = $_GET["id"];
      // show username
    //   $username = $db->getUsername($_COOKIE['username']);
    //   $contents = $db->showChoc(10);
      // $username = $_COOKIE['username'];
      $name = $db->getChocDetails($id,"name");
      echo "document.getElementById(\"details-name\").innerHTML = '$name';";
    //   echo "document.getElementById(\"hello\").innerHTML += '$username';"; 
    //   echo "document.getElementById(\"menus\").innerHTML = '$contents';";
    ?>
  

    
  };

</script>
</html>
<?php
  include_once 'src/php/action/database.php';
  // include_once 'src/php/template/navbar.php';
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
<!-- INI CONTOH KODING WKWK 
</head>
<body>

<div class="header">
  <h1>Chania</h1>
</div>

<div class="row">
  <div class="col-3 menu">
    <ul>
      <li>
      	<img src="img_5terre_wide.jpg" alt="Cinque Terre" width=150px height=140px>
      </li>
      
    </ul>
    <p>This product is so good this so good</p>
  </div>

  <div class="col-3 menu">
    <ul>
      <li>The Flight</li>
      
    </ul>
  </div>
  <div class="col-3 menu">
    <ul>
      <li>The Flight</li>
      <li>The City</li>
      <li>The Island</li>
      <li>The Food</li>
    </ul>
  </div>
  <div class="col-3 menu">
    <ul>
      <li>The Flight</li>
      <li>The City</li>
      <li>The Island</li>
      <li>The Food</li>
    </ul>
  </div>
</div>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="src/css/app.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
  <?php include_once 'src/php/template/navbar.php'?>
  <br><br><br>
  <div class="home-body">
    <div id = "hello">
      Hello,
    </div>
    <div id = "view-all-choco" href="./all-choco">
      View all chocolates
    </div>
    <div class="row">
      <div class="col-1 menu">
        <ul>
          <li>
            Test1
          </li>
        </ul>
      </div>
    </div>

  </div>

</body>
<script type="text/javascript">

  window.onload = function() {
    <?php
      include_once 'src/php/action/database.php';
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
      // show username
      $username = $db->getUsername($_COOKIE['username']);
      // $username = $_COOKIE['username'];
      echo "document.getElementById(\"hello\").innerHTML += '$username'"; 
    ?>
  

    
  };

</script>
</html>
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
<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float:left;
  padding: 15px;
}

.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  height:150px;
  color: #000000;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  text-align: center;

}

.menu li:hover {
  background-color: #0099cc;
}
</style>
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
          alert(xhttp.responseText);
      }
  };
  xhttp.open('GET', 'src/html/navbar.html', true); // note: link the footer.html
  xhttp.send();
  window.onload = function() {

    <?php

    if (($_COOKIE['superuser'])==1){
      echo 'document.getElementById("addChocolate").innerHTML = "Add Chocolate";';
    }

    ?>
  };

</script>
</html>
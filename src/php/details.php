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
    <hr>
    <div class="image-wrapper">
        <div id = details-img>
        
        </div>
    </div>

    <div id = 'details-amountsold'>
        <b>Amount sold</b>: 
    </div>
    
    <div id = 'details-price'>
        <b>Price</b>: Rp 
    </div>
    <div id = 'details-amount'>
        <b>Amount</b>: 
    </div>
    <div id = "details-desc">
        <b>Description</b><br><br>
    </div>
    <a href=<?php echo './buy-now';?>>
        <button id="buy-now" >
            
        </button>
    </a>
    <a href=<?php echo './add-stock';?>>
        <button id="add-stock">

        </button>
    </a>
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
        echo 'document.getElementById("add-stock").innerHTML = "Add Stock";';
        echo 'document.getElementById("history").style.display = "none";';
        echo 'document.getElementById("buy-now").style.display = "none";';
      }
      else{
        echo 'document.getElementById("history").innerHTML = "History";';
        echo 'document.getElementById("history").href = "/history";';
        echo 'document.getElementById("add").style.display = "none";';
        echo 'document.getElementById("buy-now").innerHTML = "Add Stock";';
        echo 'document.getElementById("add-stock").style.display = "none";';
      }
      $db = new database();
      $id = $_GET["id"];
      $name = $db->getChocDetails($id,"name");
      $img = $db->getChocDetails($id, "path");
      $amountsold = $db->getChocDetails($id, "amountSold");
      $price = $db->getChocDetails($id, "price");
      $amount = $db->getChocDetails($id, "amountRemaining");
      $desc = $db->getChocDetails($id, "description");
      
      echo "document.title='Chocolate Detail : $name';";
      echo "document.getElementById(\"details-name\").innerHTML = '$name';";
      echo "document.getElementById(\"details-img\").innerHTML += 
            '<img src=\"../../assets/images/$img\" alt=photo>';";
        echo "document.getElementById(\"details-amountsold\").innerHTML += '$amountsold';";
        echo "document.getElementById(\"details-price\").innerHTML += '$price';";
        echo "document.getElementById(\"details-amount\").innerHTML += '$amount';";
        echo "document.getElementById(\"details-desc\").innerHTML += '$desc';";
    ?>
  

    
  };

</script>
</html>
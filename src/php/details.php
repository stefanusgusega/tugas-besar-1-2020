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
  <br>
  <br>
  <div class="desc">
    <div id = "details-name">
        
    </div>
    <hr>
    <div class="row">
      <div class="col">
        <div id = details-img>
              
        </div>
      </div>
      <div class="col details">
        <div id = 'details-amountsold' class="det">
            <b>Amount sold</b>: 
        </div>
        
        <div id = 'details-price' class="det" >
            <b>Price</b>: Rp 
        </div>
        <div id = 'details-amount' class="det">
            <b>Amount</b>: 
        </div>
        <div id = "details-desc" class="det">
            <b>Description</b><br><br>
        </div>
        <br>
        <br>
        <div id="addStock" style="display: none;">
           <span class="box" onclick="addStock()">
            +
          </span>
          <span id="stock">
            0
          </span>
          <span class="box" onclick="minusStock()">
            -
          </span>
        </div>
    </div>
      <div>
        <button id="cancel" style="display: none">
          Cancel
        </button>
      
        <button id="button">

        </button>
     </div>
  </div>
  
</body>
<script type="text/javascript">

  window.onload = function() {
    <?php
      include_once 'src/php/action/database.php';
      // include_once './action/database.php';
      
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
            '<img src=\"../../assets/images/$img\" class=image alt=photo>';";
        echo "document.getElementById(\"details-amountsold\").innerHTML += '$amountsold';";
        echo "document.getElementById(\"details-price\").innerHTML += '$price';";
        echo "document.getElementById(\"details-amount\").innerHTML += '$amount';";
        echo "document.getElementById(\"details-desc\").innerHTML += '$desc';";

      if ($_COOKIE['superuser']==1) {
        echo 'document.getElementById("add").innerHTML = "Add Chocolate";';
        echo 'document.getElementById("add").href = "/add";';
        echo 'document.getElementById("history").style.display = "none";';
        echo 'document.getElementById("button").onclick = function(){loadStock()};';
        echo 'document.getElementById("button").innerHTML = "Add Stock";';

      }
      else{
        echo 'document.getElementById("history").innerHTML = "History";';
        echo 'document.getElementById("history").href = "/history";';
        echo 'document.getElementById("add").style.display = "none";';
        echo 'document.getElementById("buy-now").innerHTML = "Add Stock";';
        echo 'document.getElementById("add-stock").style.display = "none";';
      }
    ?>
    function loadStock(){
      document.getElementById("addStock").style.display ="block";
      document.getElementById("cancel").style.display ="inline-block";
      document.getElementById("button").onclick = function(){add()};

    }

    
  };

  function add(){
     var x = parseInt(document.getElementById("stock").innerHTML);
  }
  function addStock(){
      var x = parseInt(document.getElementById("stock").innerHTML);
      document.getElementById("stock").innerHTML = x+1;
    }

  function minusStock(){
    var x= parseInt(document.getElementById("stock").innerHTML);
    if (x!= 0){
    document.getElementById("stock").innerHTML = x-1;
    }
  }

</script>
</html>
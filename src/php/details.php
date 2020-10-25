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
        <div class="row det">
          <div class="col-4 title">
            <div> AMOUNT SOLD</div>
          </div>
          <div class="col-4">
            <div id = 'details-amountsold' >
            </div>
          </div>
        </div>
        <div class="row det">
          <div class="col-4 title">
            <div> PRICE</div>
          </div>
          <div class="col-4">
            <div id = 'details-price' >
            </div>
          </div>
        </div>
        <div class="row det">
          <div class="col-4 title">
            <div> AMOUNT</div>
          </div>
          <div class="col-4">
            <div id = 'details-amount' >
            </div>
          </div>
        </div>
        <div class="det">
            <div class="title col-s"> DESCRIPTION
          
            <div style="padding:10% 0"id = 'details-desc' >
            </div>

            <div id="add-stock-2" style="display: none;position: absolute;width: 15%;text-align: center" class="row ">
              <div class="col-3 box"  onclick="addStock()">
                +
              </div>
              <div id="stock" class="col-3">
                0
              </div>
              <div class="col-3 box" onclick="minusStock()">
                -
              </div>
          </div>
        </div>
      </div>
          
       <br><br>
        <br><br><br><br>
        
    </div>
      <div>
        <button id="cancel" onclick="cancel()" style="display: none">
          Cancel
        </button>
      
        <button id="add-stock-1">

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
        echo 'document.getElementById("add-stock-1").onclick = function(){loadStock()};';
        echo 'document.getElementById("add-stock-1").innerHTML = "Add Stock";';

      }
      else{
        echo 'document.getElementById("history").innerHTML = "History";';
        echo 'document.getElementById("history").href = "/history";';
        echo 'document.getElementById("add").style.display = "none";';
        echo 'document.getElementById("buy-now").innerHTML = "Add Stock";';
        echo 'document.getElementById("add-stock-1").style.display = "none";';
      }
    ?>
   

    
  };
   function loadStock(){
        document.getElementById("add-stock-2").style.display ="block";
        document.getElementById("add-stock-2").style.float ="block";
        document.getElementById("cancel").style.display ="inline-block";
        document.getElementById("cancel").style.float = "right";
        document.getElementById("add-stock-1").onclick = function(){add()};
        
      }
  function add(){
    var x = parseInt(document.getElementById("stock").innerHTML);
    if (x == 0){
      alert("Cannot add 0 stock!");
      return false;
    }
    <?php 
    echo'var id='. $_GET['id'] .';';
    ?>
    console.log(id);
    console.log(x);
    var cred = "id=" + id + "&stock=" + x;
    console.log(cred);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(this.responseText) {
              alert("Stock has been updated!"); 
            }else{
              alert("Error occured!");
            }
            location.reload();
          }
        };
    xmlhttp.open("POST", "/src/php/action/action_addstock.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(cred);  
  }
  function cancel(){
    document.getElementById("cancel").style.display ="none";
    document.getElementById("add-stock-2").style.display ="none";

    document.getElementById("add-stock-1").onclick = function(){loadStock()};


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
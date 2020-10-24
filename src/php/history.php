<?php
  // include './action/database.php';
  // if(!isset($_COOKIE['username'])) {
  //   setcookie('login', '1', time() +  (3000), '/');

  //   header('location:login.php');
  // } else {
  //   $user_db = new database();
  //   if(!$user_db->relogin($_COOKIE['username'])){
  //     header('location:login.php');
  //   }
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/table.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction History</title>
</head>
<body>
  <div id="navbar">
  </div>
  <div class="page-title">
    <h2>Transaction History</h2>
  </div>
  <div class="transaction-history">
    <table>
      <tr>
        <th class="col-title">Chocolate Name</th>
        <th class="col-title">Amount</th>
        <th class="col-title">Total Price</th>
        <th class="col-title">Date</th>
        <th class="col-title">Time</th>
        <th class="col-title">Address</th>
      </tr>

      <?php
        include './action/database.php';
        $username = 'willywangkong';
        $user_db = new database();
        $result = $user_db->getHistory($username);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
          while ($row = mysqli_fetch_assoc($result)){
            $productID = $row['productID'];
            $name = $row['name'];
            $amount = $row['amount'];
            $total = $row['total'];
            $timestamp = $row['timestamp'];
            $date = date('d, F Y',strtotime($timestamp));
            $time = date('H:i:s',strtotime($timestamp));
            $address = $row['address'];
            echo
            "
            <tr id = \"$productID\">
            <th>$name</th>
            <th>$amount</th>
            <th>Rp $total</th>
            <th>$date</th>
            <th>$time</th>
            <th>$address</th>
          </tr>
          ";      
          }
        }
      ?>
    </table>
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

    if($_REQUEST['submit']){
        
        $name = $_POST['name'];
        
        if(empty($name)){
            $make = '<h4>Anda harus mengetikkan sesuatu untuk mencari</h4>';
        }else{
            $make = '<h4>Tidak ada hasil yang sesuai</h4>';
            $sele = "SELECT * FROM data WHERE name LIKE '%$name%'";
            $result = mysqli_query($conn,$sele);
            
            if($row = mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                echo '<h4> Id						: '.$row['id'];
                echo '<br> name						: '.$row['name'];
                echo '</h4>';
            }
        }else{
        echo'<h2> Search Result</h2>';
        
        print ($make);
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        }
    }
    

    ?>

    
  }

</script>
</html>
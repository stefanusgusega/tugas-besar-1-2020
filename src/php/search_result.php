<?php
  // include './action/acion_search.php';
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
    <link rel="stylesheet" href="../css/search.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
</head>
<body>
  <div id="navbar">
  </div>
  <form action="search_result.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Search</button>
  </form>
  <div class="page-title">
    <h2>Result</h2>
  </div>
  <div class="results">
    <?php
      include './action/database.php';
      $input = $_POST['search'];
      if(empty($input)){
        echo "<h4>Anda harus mengetikkan sesuatu untuk mencari</h4>";
      } else {
        $user_db = new database();
        $result = $user_db->getDataChocolate($input);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0){
          while ($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $amountSold = $row['amountSold'];
            $price = $row['price'];
            $amountRemaining = $row['amountRemaining'];
            $description = $row['description'];
            $image_path = $row['path'];
            echo
            "<div class=\"result-container\" id=\"result-container-$id\">
            <span class=\"item-image\">
              <img src=\"../../assets/images/$image_path\">
            </span>
            <span class=\"item-description\">
              <div class=\"item-name\">$name</div>
              <div class=\"item-amount-sold\">Amount sold: $amountSold</div>
              <div class=\"item-price\">Price: Rp $price</div>
              <div class=\"item-amount-remaining\">Amount remaining: $amountRemaining</div>
              <div class=\"item-description\">
                <a>Description</a>
                <div class=\"item-description\">$description</div>
              </div>
            </span>
            </div>";
          }
        } else {
          echo'<h4>Tidak ada hasil yang cocok</h4>';
        }
        mysqli_free_result($result);
      }
    ?>
  </div>
</body>
<script type="text/javascript">
  
  // var xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function(){
  //     if (xhttp.readyState == 4 && xhttp.status == 200){
  //         document.getElementById("navbar").innerHTML += xhttp.responseText;
  //     }
  // };
  // xhttp.open('GET', '../html/navbar.html', true); // note: link the footer.html
  // xhttp.send();
  // window.onload = function() {
    
  // }

</script>
</html>
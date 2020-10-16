<?php

  if(isset($_COOKIE[$username])) {
    header('location:homepage.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <center>
    <h1>Willy Wangko Choco Factory</h1>
    <form action="../php/action_register.php" method="post" onsubmit="return validateForm()" >
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      <label for="confpassowrd">Confirm Password:</label>
      <input type="password" id="confpassword" name="confpassword" required><br><br>
      <input type="submit" value="Submit">
    </form>
    </center>
</body>
<script>
  function validateForm(){
    var pass = document.getElementById("password");
    var conf = document.getElementById("confpassword");

    
    if (pass.value != conf.value){
      alert("The passwords don't match!");
      return false
    }


  }
  </script>
</html>
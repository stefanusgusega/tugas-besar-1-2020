<?php
  include 'user.php';

  if(isset($_COOKIE['username'])) {
    $user_db = new user();
    $user_db->relogin($_COOKIE['username']);
    header('location:homepage.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <center>
    <h1>Willy Wangko Choco Factory</h1>
    <form action="../php/action_login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Submit">
    </form>
    </center>
</body>
</html>
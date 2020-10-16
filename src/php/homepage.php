<?php
  include 'user.php';

  if(!isset($_COOKIE['username'])) {
    header('location:wait.php');
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <h1>HOMEPAGE</h1>
</body>
</html>
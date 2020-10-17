<?php

  if(isset($_COOKIE['username'])) {
    header('location:homepage.php');
  } else {
    echo '<script language="javascript">';
    echo '</script>';

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/src/css/user.css">
    <link rel="stylesheet" href="/src/css/app.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="title">Willy Wangko Choco Factory</div>

    <div class="form">
    <form action="../php/action_register.php" method="post" onsubmit="return validateForm()" >
      <div class="row">
        <div class="column">
          <label for="username">Username</label>
        </div>
        <div class="column">
          <input type="text" pattern="[\w]+" id="username" name="username"  onblur="checkUsername('username')" required>
          <div class="info">
          Only letters, numbers and underscores allowed
        </div>

        </div>
      </div>
      <div class="row">
        <div class="column">
          <label for="email">Email</label>
        </div>
        <div class="column">
          <input type="text" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" onblur="checkUsername('email')" required>
          <br><br>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <label for="password">Password</label>
        </div>
        <div class="column">
          <input type="password" id="password" name="password" required><br><br>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <label for="confpassowrd">Confirm Password</label>
        </div>
        <div class="column">
          <input type="password" id="confpassword" name="confpassword" required><br><br>
        </div>  
       
      </div>
      <div class="warning">
         <div id="answer" style="padding:0;margin:0;position: absolute;">
         </div>
         <br>
         <div id="answer2" style="padding:0;margin:0;position: absolute;">
         </div>
      </div>
      <br>
      <br><br>
      <div style="text-align:  right ">
        <input type="submit" value="Register">
        <br>
        <a href="./login.php">
        Already have an 
        <span style="text-decoration: underline;">
          account?
        </span>
        </a>
      </div>
    </form>
   
    </div>
</body>
<script>
 
  function validateForm(){
    var pass = document.getElementById("password");
    var conf = document.getElementById("confpassword");
    var answer = document.getElementById("answer").innerHTML;
    var answer2 = document.getElementById("answer2").innerHTML;
    if (pass.value != conf.value){
      alert("The passwords don't match!");
      return false;
    } else if (answer != '' || answer2 !=''){
      alert("Choose another email or username!");
      return false;
    }

  }
  function checkUsername(id){
    var box = document.getElementById(id);
    if (id == "username"){
      var patt = /^[\w]+$/;
      var cred = "uname=" + box.value;
    } else {
       var patt = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
       var cred = "em=" +box.value;
    }
    if (box.value!=''){
      if(box.value.match(patt)){
         var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              if(xmlhttp.responseText == 1){
                box.style.border ="2px solid green";
                  if (id=="username"){
                    document.getElementById("answer").innerHTML = "";
                  } else{
                    document.getElementById("answer2").innerHTML = "";
                  }

              } else{
                box.style.border="2px solid red";
                  if (id=="username"){
                    document.getElementById("answer").innerHTML = "Username already exists";
                  } else{
                    document.getElementById("answer2").innerHTML = "Email already exists";
                  }
              }
            }
          };
          xmlhttp.open("POST", "action_register.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xmlhttp.send(cred);


      } else{

        box.style.border ="2px solid red";

      }
     
    } else{
      box.style.border ="1px solid black";
      if (id == "username"){
        document.getElementById("answer").innerHTML = '';
      } else {
        document.getElementById("answer2").innerHTML = '';
      }
    }
    showMessage();

  }
  </script>
</html>
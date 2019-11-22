<?php

?>
<body>
<link href="style/login.css" rel="stylesheet" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="KIK_SVG.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="login" placeholder="password">
      <button type="button" class="fadeIn fourth" value="Log In" onclick="sendlog()">log in</button>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>
    <div class="alert alert-danger" id="errwar">
    <strong>Login Error! </strong> check username or password
  </div>

  </div>
</div>
</body>
<script>
document.getElementById("errwar").style.display = "none";
    function sendlog(){ 
       var uname = document.getElementById('login').value;
       var password = document.getElementById('password').value;

        $.ajax({
          type: 'POST',
          url: 'login-ajax.php',
          data:
            {
            val_option:"login",  
            name: uname,
            pass:password
            },
          dataType:'json',
          success: function sendlog (response) {
            var value = response['stat'];
            var res =  response['res'];
            if(value==true && res=='success'){
              location.replace("design-home.php");
            }
            else{         
              document.getElementById("errwar").style.display = "block";
            }
          }
        });
      }

</script>
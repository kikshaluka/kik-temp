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
      <input type="button" class="fadeIn fourth" value="Log In" onclick="send(this.value)">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</body>
<script>

    function send(val){ 
       var uname = document.getElementById('login').value;
       var password = document.getElementById('password').value;
       var str1="sxojjfmkcvjfskfoiro";
       var str2="judfhiurklfnsdifhreis";
       var password=str1.concat(password,str2);
        $.ajax({
          type: 'POST',
          url: 'ajax.php',
          data:
            {
            val_option=val,  
            name: uname,
            pass=password
            },
          dataType:'json',
          success: function send (response) {
            alert("DID");
          }
        });
      }

</script>
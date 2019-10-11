<?php
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="" id="usrname" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="emailadd" id="usremail" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="usrpass" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="usrcpass" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="button" class="btn btn-primary btn-block" onclick="exceptionH()"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
</body>
<script>

function exceptionH(){
    EmailAccountVerify(); // email account verify
    confirmpassmatch(); //password confirm
    if(EmailAccountVerify()&&confirmpassmatch()){
        
       usrsignup();
        alert("All good");
    }
    else{
        errorAlert("Check below boxes",2000);
    }  
}

function confirmpassmatch()//check whether the passwords are matching 
{ 
    var pass=document.getElementById("usrpass").value;
    var cpass=document.getElementById("usrcpass").value;
    if(pass==""||cpass==""){
        document.getElementById("usrpass").style.borderColor = "red";
        document.getElementById("usrcpass").style.borderColor = "red";
        return false;
    }else{
        if (pass!=cpass){
            document.getElementById("usrpass").style.borderColor = "red";
            document.getElementById("usrcpass").style.borderColor = "red";
            return false;
        }
        else{
            document.getElementById("usrpass").style.borderColor = "gray";
            document.getElementById("usrcpass").style.borderColor = "gray";
            return true;
        }
    }
    
}

function validateEmail(email) { // 
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function EmailAccountVerify() { // Check whether an valid email address
  var email = $("#usremail").val();
  if (!validateEmail(email)) {
    document.getElementById("usremail").style.borderColor = "red";
    return false;
  }
  else{
    document.getElementById("usremail").style.borderColor = "grey";
    return true;
  } 
}


function errorAlert(msg,duration) // generate an error message
{
     var el = document.createElement("div");
     el.setAttribute("style","position:absolute;top:2%;left:45%;background-color:red; color:white;");
     el.innerHTML = msg;
     setTimeout(function(){
      el.parentNode.removeChild(el);
     },duration);
     document.body.appendChild(el);
}

function usrsignup(){
    alert('ok');
    var mail=document.getElementById("usremail").value;
    var name=document.getElementById("usrname").value;
    var pass=document.getElementById("usrpass").value;

    $.ajax({
          type: 'POST',
          url: 'signup-ajax.php',
          data:
          {
            sign_up: 'yes',
            uname:name,
            umail:mail,
            upass:pass
            },
          dataType:'json',
          success: function usrsignup (response) {
            if(response["message"]=="1062"){
                errorAlert("Email exist please login",2000);
                //alert("Email exist please login");
            }
            else{
                alert(response["message"]);
            }
          }
        });
}

</script>
</html>
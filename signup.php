<?php
  include_once("include/db.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/login/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/login/util.css">
  <link rel="stylesheet" type="text/css" href="css/login/main.css">




  </head>
  <body>
    <div class="loader" id="loader">
      <img src="img/loader.svg" alt=""></img>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand brand" href="index.html">

          <img src="img/logo.png" alt="">PLAYAREA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="mr-auto">
        </div>

        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-nav" href="index.html">HOME</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link text-nav" href="login.php">LOGIN </a>
        </li>
        </ul>

      </div>
    </nav>

<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form name="f1" action = "authentication_signup.php" onsubmit = "return true" method = "POST" class="login100-form validate-form p-l-55 p-r-55 p-t-178">  
      <span class="login100-form-title">
            CUSTOMER REGISTRATION
          </span>
   


            <center> 
              <p>  
                
                <label></label>  
                <input type = "text" id ="name" name  = "name" placeholder="your name*" class="input100" pattern="[A-Za-z]{1,32}" title="Name can only contain Alphabets" required="" />  
             
            </p>   
            <p>  
              
                <label></label>  
                <input type = "text" id ="user" name  = "user" placeholder="your email*" class="input100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email" required="" />  
            
            </p>
              <p>  
                 
                <label></label>  
                <input type = "text" id ="phone" name  = "phone" placeholder="your mobile no*" class="input100" pattern="[6-9]{1}[0-9]{9}" title="Enter valid mobile number" required="" />  
            </p>  
            <p>  
                <label></label>  
                <input type = "text" id ="hna" name  = "hna" placeholder="your house name*" class="input100" required="" />  
            </p> 
            <p>  
                <label></label>  
                <input type = "text" id ="street" name  = "street" placeholder="your street*" class="input100" required="" />  
            </p> 
            <p>  
                <label></label>  
                <input type = "text" id ="pin" name  = "pin" placeholder="your pincode*" class="input100" required="" />  
            </p>  
            <p>  
                <label></label>  
                <input type = "password" id ="pass" name  = "pass" placeholder="your password*" class="input100" required="" />  
            </p>
             <p>  
                <label></label>  
                <input type = "password" id ="password2" name  = "password2" placeholder="confirm your password*" class="input100" required="" />  
            </p> 
            <p>   
              <br>
            <div class="container-login100-form-btn">   
                <input type =  "submit" id = "btn" value = "REGISTER" class="login100-form-btn" /> 
                </div> 
            
          <div class="flex-col-c p-t-170 p-b-40">
 <a href="login.php" class="txt3">
             Already have an account?-Login!
            </a>
          </div>
            </p>
            </center>  
        </form>  
      </div>
    </div>
    <br>

 <script>
        window.onload = function() {
            document.getElementById("pass").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("pass").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>

    <div class="container-fluid wide">
     
    </div>
 <div class="footer">
        <img src="img/grass.png" class="img-footer" alt="">

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/login/main.js"></script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/signup.js" charset="utf-8"></script>
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php include('connect.php')?>
<?php include('config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
   
   <style> 
   body
    {
      background: #000;
      min-height: 100vh;
    background:url(image1.JPEG) no-repeat;
    background-size: cover;
    }
  </style>
  <!-- header-->
<div id="header">
<img src="Capture.JPG">
    <!--navigation-->
    <div class="navscroll">
            <nav>
              <div class="title">
                  <h2> MATHARE LAW FIRM </h2>
              </div>
              
              <ul class="navlinks">
            
                <li><a href="index.php">Home</a></li>
              </ul>
              <div class="mobile">
                  <div class="line1"></div>
                  <div class="line2"></div>
                  <div class="line3"></div>
              </div>
          </nav>
          </div>
          <script src="index.js"></script>

</head>
</head>
<script src="index.js"></script>
<body>

<div id="signinform" class="signinpage">
        <div class="formcapsule">
            <!--the toogle button between the signup and login form-->
                    <div class="buttonbox">
                        <div id="btn"></div>
                        <button type="button" onclick="login()" class="toggle-btn">Sign In</button>
                        <button type="button" onclick="register()" class="toggle-btn">Sign Up</button>
                        <style>
                            button
                            {
                                color: white;
                                font-size: 13px;
                            }
                            
                        </style>
                
                </div>
<form method="post"   action="" id="login" class="inputgrouplogin">
            
                <input type="text" class="input-field" placeholder="Enter Email" required  name="email">
                <input type="password" class="input-field" placeholder="Enter Password" required name="password1" > 
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn" name="login_user">Sign In</button>
            </form>
            <!--signup form-->
            <form method="post" action="loginu.php" id="register" class="inputgroupregister">
            
            <input type="text" name="name" class="input-field" placeholder="name" required >
            <input type="text" name="town" class="input-field" placeholder="town" required >
            <input type="text" name="address" class="input-field" placeholder="address" required >
            <input type="number" name="telephone" class="input-field" placeholder="telephone" required >
            <input type="email" name="email"class="input-field" placeholder="email" required >
            <input type="password" name="password"class="input-field" placeholder="Enter password" required name="password1" >
            <input type="password" name="password"class="input-field" placeholder="confirm password" required name="password2">
                
                <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
               <a href="loginu.php"> <button type="submit" class="submit-btn" name="reg_client">Sign Up</button></a>
                <style>
                span
              {
                color: #777;
                font-size: 12px;
                bottom: 68px;
                position: absolute;
                }
                </style>
            </form>
        </div>
    
             <script>
            
            /*signup and login switching function*/
            var x=document.getElementById("login");
              var y=document.getElementById("register");
              var z=document.getElementById("btn");
              function register()
              {
                  x.style.left="-400px";
                  y.style.left="50px";
                  z.style.left="110px";
              }
              function login()
              {
                  x.style.left="50px";
                  y.style.left="450px";
                  z.style.left="0px";
              }
             
                    </script>
                </div>
                <script src="index.js"></script>
</body>
</html>
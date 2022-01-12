

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Home</title>
    <style>
    body
    {
      background: #808080;
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
                
                <li>
                
                <a href="">
                  <P>Log out <i class="fa fa-caret-down" aria-hidden="true"></i></p>
                </a>
            
              </li>
              
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
<body>
div id="signinform" class="signinpage">
        <div class="formcapsule">
            <!--admin login form-->
                    
<form method="post"   action="loginc" id="login" class="inputgrouplogin">
            
<div class="icon">
                        <p class="regstcase">Registar your case</p>
                      
                </div>
<!--register case form-->
            <form method="post" action="case.php" id="register" class="inputgroupregister">
            
         <input type="number" name="refnumber" class="input-field" placeholder="file number" required>
        <input type="text"  name="name" class="input-field" placeholder="file name" required>
        <input type="text" name="type" class="input-field" placeholder="case type" required>
        <input type="date" name="openingdate" class="input-field" placeholder="opening date" required>
        <input type="file" name="file" class="input-field" placeholder="files" required>

               <a href="case.php"> <button type="submit" class="submit-btn" name="reg_case">register case</button></a>
            </form>
                </div>
                <script src="index.js"></script>
    
</body>
</html>



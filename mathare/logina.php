<?php
// Initialize the session
session_start();
$msg="";

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM clients WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body
    {
      background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(image1.jpeg);
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
                <li><a href="practice.php">practice area</a></li>
                <li><a href="connect.php">About Us</a></li>
                <li><a href="case.php">case</a></li>
                <li><a href="service.html">Service</a></li>
                <li><a href="contact.php">Contant us</a></li>
                <li>
                
                <a href="">
                  <P>Login <i class="fa fa-caret-down" aria-hidden="true"></i></p>
                </a>
                
                <ul>
                  <li><a href="loginu.php">Client</a></li>
                  <li><a href="logina.php">Advocate</a></li>
                  <li><a href="loginc.php">Admin</a></li>
                </ul>
              </li>
              </ul>
              <div class="mobile">
                  <div class="line1"></div>
                  <div class="line2"></div>
                  <div class="line3"></div>
              </div>
          </nav>
          </div>
</head>
<body>
	<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login as Client</p>
      <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
			<p class="login-register-text">Don't have an account? <a href="connects.php">Register Here</a>.</p>
		</form>
    <?php  echo $msg; ?>  <?php  echo $username_err ?> 

	</div>
</body>
</html>
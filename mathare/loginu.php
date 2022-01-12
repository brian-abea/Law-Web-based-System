<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $telephone = $address = $town= $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
   $msg="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM staff WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                    $telephone = trim($_POST["telephone"]);
                    $address = trim($_POST["address"]);
                    $type = trim($_POST["type"]);

                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
 $password_err="<div align='center' class='alert alert-danger'>
          <strong>Password must have atleast 6 characters</strong>.
        </div>";
    } else{
        $password = trim($_POST["password"]);
        $telephone= trim($_POST["telephone"]);
        $address = trim($_POST["address"]);
        $type= trim($_POST["type"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO staff (username, password,telephone,address,type) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_telephone, $param_address, $param_type);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_telephone = $telephone;
            $param_address = $address;
            $param_type = $type;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
             //    header("location: login.php");
              $msg="<div align='center' class='alert alert-success'>
    <strong>Registration successful!</strong>.
  </div>";
            } else{
                   $msg="<div align='center' class='alert alert-danger'>
                  <strong>Something went wrong. Please try again later!</strong>.
                </div>"; 
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

 

	<link rel="stylesheet" type="text/css" href="./style.css">
  
 	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

	<title>Register Form - client</title>
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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="login-email" method="POST"  >
 <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required>
            </div>    
   <div class="input-group">
                <label>Address</label>
                <input type="text" name="address"  required>
            </div>   
             <div class="input-group">
                <label>Telephone</label>
                <input type="text" name="telephone" class="form-control  required">
            </div>   <br>  
             <div class="input-group">
                <label>Type</label>
             <select id="type" name="type" class="form-control">
            <option value="Staff">Staff</option>
            <option value="Admin">Admin</option>
            </select>
            </div>   
             <div class="input-group">
                <label>Email</label>
                <input type="email" name="email"  required>
            </div>             
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" required>
 
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required>
 
            </div>
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Submit">
 
            </div>

		</form>
		   <?php  echo $msg;  ?>                            
                          <?php  echo $confirm_password_err; ?>  <?php  echo $username_err ?> 
		    <p class="login-register-text">Have an account? <a href="loginc.php">Login Here</a>.</p></div>     

</body>
</html>

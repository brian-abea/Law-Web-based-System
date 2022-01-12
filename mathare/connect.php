<?php 

include 'trial.php';

error_reporting(0);

session_start();

if (isset($_SESSION['names'])) {
    header("Location: logina.php");
}

if (isset($_POST['submit'])) {
  $names = $_POST['names'];
  $address    = $_POST['address'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $DOB = $_POST['DOB'];
  $DOE = $_POST['DOE'];
  $email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM staff WHERE email ='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql =  "INSERT INTO staff (names, email, DOB, DOE, password,  type, gender, address) 
      VALUES('$names', '$email','$DOB','$DOE', '$password', '$type', $gender','$address')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$names = "";
        $email    = "";
        $DOB="";
        $DOE="";
        $_POST['password'] = "";
				$_POST['cpassword'] = "";
        $type="";
        $gender = "";
        $address="";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

	<link rel="stylesheet" type="text/css" href="style.css">
  
  

	<title>Register Form - Staff</title>
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
		<form action="connect.php" method="POST" class="login-email">
      <?php include('error.php')?>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register as staff</p>
			<div class="input-group">
				<input type="text" placeholder="names" name="names" value="<?php echo $names; ?>" required>
			</div>
      <div class="input-group">
				<input type="text" placeholder="address" name="address" value="<?php echo $address; ?>" required>
			</div>
      <div class="input-group">
				<input type="text" placeholder="type" name="type" value="<?php echo $type; ?>" required>
			</div>
      <div class="input-group">
				<input type="date" placeholder="DOB" name="Date of birth" value="<?php echo $DOB; ?>" required>
			</div>
      <div class="input-group">
				<input type="date" placeholder="DOE" name="Date of Employment" value="<?php echo $DOE; ?>" required>
			</div>
      <div class="input-group">
				<input type="text" placeholder="gender" name="gender" value="<?php echo $gender; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="logina.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
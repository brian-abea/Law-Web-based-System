<?php
// Initialize the session
session_start();
include "config.php";
error_reporting(E_ALL ^ E_NOTICE);
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: logina.php");
    exit;
}
?>
   <?php
   $msg="";
    // connect to the database
    // if the register button is clicked
    if (isset($_POST['btn-save']))
    {
    $type  = $_POST['type'];
    $description = $_POST['description'];
    // if there are no errors, save user to database

    $sql = "INSERT INTO cases(type, description) VALUES('$type', '$description')";
    mysqli_query($link, $sql);
    $msg= "case filed successfully";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
  
<!-- header-->
<div id="header">
    <!--navigation-->
    <div class="navscroll">
            <nav>
              <div class="title">
                  <h2> MATHARE LAW FIRM </h2>
              </div>
              <h5 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h5>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
              </div>
          </nav>
          </div>
</head>
<body>
<div class="container">
<h5>File Case</h5>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="login-email" method="POST"  >
 <div class="input-group">
                <label>Case Type:</label><br><br><br><br>
             <select id="type" name="type" class="form-control">
            <option value="Theft">Theft</option>
            <option value="Other">Other</option>
            </select>
            </div>    
   <div class="input-group">
                <label>Description:</label>
                <input type="text" name="description"  required>
            </div>  
            <br><br>
            <div class="input-group">
                <input type="submit" name="btn-save" id="btn-save" class="btn btn-primary" value="Submit">
            </div>
		</form>   <?php echo $msg?>

</body>
</html>
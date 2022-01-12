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
$user=$_SESSION["username"]; 
$query1 = mysqli_query($link, "SELECT * FROM staff where username='$user'");
$res = mysqli_fetch_array($query1);
$typeuser = $res['type'];
?>
   <?php
   $msg="";
    // connect to the database
    // if the register button is clicked
    if (isset($_POST['btn-save']))
    {
    $type  = $_POST['type'];
    $description = $_POST['description'];
    $clientname  = $_POST['clientname'];
    $assign  = $_POST['assign'];

    // if there are no errors, save user to database

    $sql = "INSERT INTO cases(type, description,addedby,clientname) VALUES('$type', '$description','$assign','$clientname')";
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
   <a href="mycases.php">My Cases</a>
 <?php
if ($typeuser == "Admin") {
    echo "<a href='mycases.php'>Add Staff</a>";
    }
    else{
    echo "";
    }
?>
<?php
if ($typeuser == "Admin") {
    echo "<a href='mycases.php'>Add Client</a>";
    }
    else{
    echo "";
    }
?>
<?php
if ($typeuser == "Admin") {
    echo "<a href='assigncase.php'>Assign Case to Staff</a>";
    }
    else{
    echo "";
    }
?>
    <p>
        <a href="logouts.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
    
              </div>
          </nav>
          </div>
</head>
<body>
<div class="container">
<h5>Add Client with Case</h5>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  class="login-email" method="POST"  >
        <div class="input-group">
                <label>Client Name:</label>
                <input type="text" name="clientname"  required>
            </div>  <br><br>
 <div class="input-group">
              <select id="type" name="type" class="form-control">
            <option value="Theft">Theft</option>
            <option value="Other">Other</option>
            </select>
            </div>    
   <div class="input-group">
                <label>Description of Case:</label>
                <input type="text" name="description"  required>
            </div>  <br><br>
            <div class="input-group">
                <label>Assign To:</label>&nbsp;&nbsp;
                <?php
            echo '<select class="form-control" name="assign">
            <option>Select</option>';
            $sqli = "SELECT * FROM staff";
            $result = mysqli_query($link, $sqli);
            while ($row = mysqli_fetch_array($result)) {
            echo '<option>'.$row['username'].'</option>';
            }
            echo '</select>';
            
            ?>
            </div>  
            <br><br>
            <div class="input-group">
                <input type="submit" name="btn-save" id="btn-save" class="btn btn-primary" value="Submit">
            </div>
 
		</form>   <?php echo $msg?>

</body>
</html>
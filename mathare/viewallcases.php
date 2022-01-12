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
   $user=$_SESSION["username"]; 
    // connect to the database
    // if the register button is clicked
    if (isset($_POST['btn-save']))
    {
    $type  = $_POST['type'];
    $description = $_POST['description'];
    // if there are no errors, save user to database

    $sql = "INSERT INTO cases(type, description,addedby) VALUES('$type', '$description','$user')";
    mysqli_query($link, $sql);
    $msg= "case added successfully";
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

	<link rel="stylesheet" type="text/css" href="stylec.css">
    <style>
    container {
    width: 800px !important;
}
table {
  border: 1px solid black;
}
    </style>
 <style>
table, th, td {
  border: 1px solid black;
}

table {
  width: 100%;
}
</style>   
  
<!-- header-->
<div id="header">
    <!--navigation-->
    <div class="navscroll">
            <nav>
              <div class="title">
                  <h2> MATHARE LAW FIRM </h2>
              </div>
              <h5 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h5>
           
               <a href="welcomeuser.php">Add Cases</a>

    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
    
              </div>
          </nav>
          </div>
</head>
<body>
<div class="container" >
<h5>Add Client with Case</h5>
<?php
include_once 'config.php';
$result = mysqli_query($link,"SELECT * FROM cases ");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table width="200px" >
  
  <tr>
    <td> Type</td>
    <td> Client Name</td>
    <td> Description</td>
    <td>Date</td>
    <td>Status </td>
    <td>Clear Case </td>

  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["type"]; ?></td>
    <td><?php echo $row["clientname"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
    <td><?php echo $row["created"]; ?></td>
    <td><?php echo $row["active"]; ?></td>
    <td><a href="clearcase.php?id=<?php echo $row["id"]; ?>">Clear Case</a></td>

</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
</body>
</html>
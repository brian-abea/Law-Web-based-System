<?php 

session_start();

if (!isset($_SESSION['names'])) {
    header("Location: loginc.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['names'] . "</h1>"; ?>
    <a href="logout.php">Logout</a>
</body>
</html>
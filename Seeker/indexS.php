<?php
require 'config.php';
require 'headerS.html';
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  $q = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginS.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css">
<head>
 
  
 
</head>
  <body>
    <h1>Welcome <?php echo $row["Name"]; ?></h1>
    <a href="logoutS.php">Logout</a>
    
  </body>
</html>

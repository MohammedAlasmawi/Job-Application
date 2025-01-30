<?php
require 'headerC.html';
require 'config.php';

if(!empty($_SESSION["companyID"])){
  $companyID = $_SESSION["companyID"];
  $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginC.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css">
<head>
  <body>
    <h1>Welcome <?php echo $row["Name"];?></h1>
    <a href="logoutC.php">Logout</a>
  </body>
</html>


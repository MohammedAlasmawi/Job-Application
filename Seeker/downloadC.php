<?php
require 'config.php';
require 'headerS.html';
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  $q = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
  $row = mysqli_fetch_assoc($q);
  $t1 = mysqli_query($conn, "SELECT seekerID FROM seeker WHERE `Email` = '$Email'");
  $t2 = mysqli_fetch_array($t1); 
  $seekerID = $t2["seekerID"];
}
else{
  header("Location: loginS.php");
}



?>


<?php
require 'config.php';
require 'headerA.html';
if(!empty($_SESSION["AdminID"])){
  $AdminID = $_SESSION["AdminID"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = $AdminID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginA.php");
}


mysqli_query($conn, "Delete FROM company_event WHERE companyID = $companyID and eventID = $eventID");
?>
<?php
include 'config.php';
if(!empty($_SESSION["companyID"])){
    $companyID = $_SESSION["companyID"];
    $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
    $row = mysqli_fetch_assoc($q);
  }
  else{
    header("Location: loginC.php");
  }
$eventID = $_GET["id"];
mysqli_query($conn, "Delete FROM company_event WHERE eventID = $eventID and companyID = $companyID");
?>

<script type="text/javascript">
window.location="eventC.php";
</script> 
<?php
include 'config.php';
require 'headerA.html';
if(!empty($_SESSION["AdminID"])){
  $AdminID = $_SESSION["AdminID"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = $AdminID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginA.php");
}

$eventID = $_POST["eventID"];
$companyID = $_POST["companyID"];
mysqli_query($conn, "Delete FROM company_event WHERE eventID = $eventID and companyID = $companyID");
?>

<script type="text/javascript">
window.location="eventA.php";
</script>


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

$eventID = $_GET["id"];
$AdminID = $_SESSION["AdminID"];
mysqli_query($conn, "Delete FROM event WHERE eventID = $eventID and AdminID = $AdminID");
?>

<script type="text/javascript">
window.location="eventA.php";
</script>


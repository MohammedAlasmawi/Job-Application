<?php
include 'config.php';
$eventID = $_GET["id"];
mysqli_query($conn, "Delete FROM company WHERE eventID = $eventID");
?>

<script type="text/javascript">
window.location="users.php";
</script> 
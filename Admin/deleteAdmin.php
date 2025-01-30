<?php
include 'config.php';
$AdminID = $_GET["id"];
mysqli_query($conn, "Delete FROM admin WHERE AdminID = $AdminID");
?>

<script type="text/javascript">
window.location="users.php";
</script> 
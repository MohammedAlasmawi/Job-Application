<?php
include 'config.php';
$seekerID = $_GET["id"];
mysqli_query($conn, "Delete FROM seeker WHERE seekerID = $seekerID");
?>

<script type="text/javascript">
window.location="users.php";
</script> 
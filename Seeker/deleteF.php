<?php
include 'config.php';
$certificateID = $_GET["id"];
mysqli_query($conn, "Delete FROM certificate WHERE certificateID = $certificateID");
?>

<script type="text/javascript">
window.location="profile.php";
</script> 
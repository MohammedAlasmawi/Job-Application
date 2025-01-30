<?php
include 'config.php';
$experienceID = $_GET["id"];
mysqli_query($conn, "Delete FROM experience WHERE experienceID = $experienceID");
?>

<script type="text/javascript">
window.location="profile.php";
</script> 
<?php
include 'config.php';
$educationID = $_GET["id"];
mysqli_query($conn, "Delete FROM education WHERE educationID = $educationID");

?>

<script type="text/javascript">
window.location="profile.php";
</script>
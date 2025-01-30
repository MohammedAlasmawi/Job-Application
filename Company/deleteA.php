<?php
include 'config.php';
$applicationID = $_GET["id"];
mysqli_query($conn, "Delete FROM application WHERE applicationID = $applicationID");
?>

<script type="text/javascript">
window.location="applications.php";
</script>
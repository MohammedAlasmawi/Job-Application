<?php
include 'config.php';
$companyID = $_GET["id"];
mysqli_query($conn, "Delete FROM company WHERE companyID = $companyID");
?>

<script type="text/javascript">
window.location="users.php";
</script> 
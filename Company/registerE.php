<?php
require 'headerC.html';
require 'config.php';

$companyID = $_SESSION["companyID"];
$eventID = $_GET["id"];
$duplicate = mysqli_query($conn, "SELECT * FROM company_event WHERE companyID = '$companyID' and eventID = '$eventID'");
if(mysqli_num_rows($duplicate) > 0){
  echo
  "<script> alert('Already Registerd'); </script>";
}
else{
    mysqli_query($conn, "INSERT INTO company_event VALUES('','$companyID','$eventID')");
    echo "<script> alert('Registration Successful'); </script>";
}


if(!empty($_SESSION["companyID"])){
    $companyID = $_SESSION["companyID"];
    $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
    $row = mysqli_fetch_assoc($q);
  }
  else{
    header("Location: loginC.php");
  }

?>

<script type="text/javascript">
window.location="eventC.php";
</script>
<?php
require 'config.php';
require 'headerC.html';

$seekerID = $_POST["seekerID"];
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  $q = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
  $row = mysqli_fetch_assoc($q);
  $t1 = mysqli_query($conn, "SELECT seekerID FROM seeker WHERE `Email` = '$Email'");
  $t2 = mysqli_fetch_array($t1); 
  $seekerID = $t2["seekerID"];
}
else{
  header("Location: loginS.php");
}
$fullName = "";
$gender = "";
$jobField = "";
$duration = "";
$Availability = "";

$res = mysqli_query($conn,"select * from information where seekerID = $seekerID");
while($row = mysqli_fetch_array($res)){

    $fullName = $row["fullName"];
    $gender = $row["gender"];
    $mobileNumber = $row["mobileNumber"];
    $skills = $row["skills"];
    $Availability = $row["Availability"];
}
 
if(isset($_POST["updateBtn"])){

   
  mysqli_query($conn,"update information set fullName='$_POST[fullName]', gender='$_POST[gender]', mobileNumber = '$_POST[mobileNumber]', skills='$_POST[skills]', Availability='$_POST[Availability]' where seekerID = '$seekerID'")
  ?>
   <script type="text/javascript">
   window.location="profile.php";
  </script>
  <?php 
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  <title>Edit information</title>
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Edit Information</h2>
      <input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>" placeholder="FullName"> <br>
      <input type="text" name="fullName" id = "fullName" value="<?php echo $fullName ?>" placeholder="FullName"> <br>
      <input type="text" name="gender" id = "gender" value="<?php echo $gender ?>" placeholder="gender"> <br>
      <input type="text" name="mobileNumber" id = "mobileNumber" value="<?php echo $mobileNumber ?>" placeholder="Mobile Number"> <br>
      <input type="text" name="skills" id = "skills" value="<?php echo $skills ?>" placeholder="Skills"> <br>
      <input type="text" name="Availability" id = "Availability" value="<?php echo $Availability ?>" placeholder="Please enter Yes or No"> <br>
      <br>
      <button name="updateBtn" type="submit" class="updateBtn1">Update</button>
    </form>
    <br>
<br>
<br>
<br>
<br>
</div>
<br>
<br>
<br>
<br>
<br>
</body>

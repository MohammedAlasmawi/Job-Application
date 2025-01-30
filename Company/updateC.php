<?php
require 'config.php';
require 'headerS.html';

//$seekerID = $_POST["seekerID"];

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
if(isset($_POST["updateBtn"])){

  $file = $_FILES["file"]["name"];
  $tmp_name= $_FILES["file"]["tmp_name"];
  $path="C/".$file;
  $file1=explode(".",$file);
  $ext=$file1[1];
  $allowed=array("pdf");
  if(in_array($ext,$allowed)){
      move_uploaded_file($tmp_name,$path);
      mysqli_query($conn,"update seeker_profile set C ='$file' where seekerID = $seekerID");
  }
  
  ?>
  <script type="text/javascript">
   window.location="profile.php";
  </script>
  <?php  
}

$C = "";
$res = mysqli_query($conn,"select * from seeker_profile where seekerID = '$seekerID'"); 
while($row = mysqli_fetch_array($res)){

    $C = $row["C"];
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Edit C.V</h2>
      <input type="file" name="file" class="file">
      <br>
      <br>
      <button name="updateBtn" type="submit" class="updateBtn1">Update</button>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
</body>
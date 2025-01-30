<?php
require 'config.php';
require 'headerC.html';

$certificateID = $_POST["certificateID"];
$certificateTitle = "";
$certificateField = "";
$resource = "";

$res = mysqli_query($conn,"select * from certificate where certificateID = $certificateID");
while($row = mysqli_fetch_array($res)){
    $certificateID = $row["certificateID"];
    $certificateTitle = $row["certificateTitle"];
    $certificateField = $row["certificateField"];
    $resource = $row["resource"];
}


if(isset($_POST["updateBtn"])){

  $certificateField = $_POST["certificateField"];
  $certificateField1 = implode(",",$certificateField);
  mysqli_query($conn,"update certificate set certificateTitle='$_POST[certificateTitle]', resource='$_POST[resource]', certificateField = '$certificateField1'  where certificateID = '$certificateID'")
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
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Edit Application</h2>
      <input type="hidden" name="certificateID" id = "certificateID" value="<?php echo $certificateID ?>" placeholder="certificateTitle"> <br>
      <input type="text" name="certificateTitle" id = "certificateTitle" value="<?php echo $certificateTitle ?>" placeholder="certificateTitle"> <br>
      <input type="text" name="resource" id = "resource" value="<?php echo $resource ?>" placeholder="source"> <br>
      <br>
      <div class="fr_check">
      <label>Choose a Field: (You can select multiple)</label><br>
      <input name="certificateField[]" type="checkbox" value="ICT">ICT</input>
      <input name="certificateField[]" type="checkbox" value="Business">Business</input>
      <input name="certificateField[]" type="checkbox" value="Logistics">Logistics</input><br>
      <input name="certificateField[]" type="checkbox" value="Engineering">Engineering</input>
      <input name="certificateField[]" type="checkbox" value="Digital Marketing">Digital Marketing</input><br>
      <input name="certificateField[]" type="checkbox" value="Visual Design">Visual Design</input>
      <input name="certificateField[]" type="checkbox" value="Web Media">Web Media</input><br>
      <br>
      
      <button name="updateBtn" type="submit" class="updateBtn">Update</button>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
</body>
 


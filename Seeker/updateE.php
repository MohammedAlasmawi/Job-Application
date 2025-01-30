<?php
require 'config.php';
require 'headerS.html';
$experienceID = $_POST["experienceID"];
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
  $jobField = $_POST["jobField"];
  $jobField1 = implode(",",$jobField);
  mysqli_query($conn,"update experience set jobTitle='$_POST[jobTitle]', companyName='$_POST[companyName]', jobField = '$jobField1', duration='$_POST[duration]'  where experienceID = '$experienceID'");
  ?>
   <script type="text/javascript">
   window.location="profile.php";
  </script>
  <?php  
}

//$experienceID = $_POST["experienceID"];
echo $seekerID;
echo $experienceID;
//$experienceID = $_GET["id"];
$jobTitle = "";
$companyName = "";
$jobField = "";
$duration = "";



$res = mysqli_query($conn,"select * from experience where experienceID = '$experienceID'");
while($row = mysqli_fetch_array($res)){
    $experienceID = $row["experienceID"];
    $jobTitle = $row["jobTitle"];
    $companyName = $row["companyName"];
    $jobField = $row["jobField"];
    $duration = $row["duration"];
    
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
      <input type="text" name="experienceID" id = "experienceID" value="<?php echo $experienceID ?>" placeholder="jobTitle" readonly> <br>
      <input type="text" name="jobTitle" id = "jobTitle" value="<?php echo $jobTitle ?>" placeholder="jobTitle"> <br>
      <input type="text" name="companyName" id = "companyName" value="<?php echo $companyName ?>" placeholder="companyName"> <br>
      <input type="text" name="duration" id = "duration" value="<?php echo $duration ?>" placeholder="duration"> <br>
      <br>
      <div class="fr_check">
      <label>Choose a Field: (You can select multiple)</label><br>
      <input name="jobField[]" type="checkbox" value="ICT">ICT</input>
      <input name="jobField[]" type="checkbox" value="Business">Business</input>
      <input name="jobField[]" type="checkbox" value="Logistics">Logistics</input><br>
      <input name="jobField[]" type="checkbox" value="Engineering">Engineering</input>
      <input name="jobField[]" type="checkbox" value="Digital Marketing">Digital Marketing</input><br>
      <input name="jobField[]" type="checkbox" value="Visual Design">Visual Design</input>
      <input name="jobField[]" type="checkbox" value="Web Media">Web Media</input><br>
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

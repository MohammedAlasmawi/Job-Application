<?php
require 'config.php';
require 'headerS.html';
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
if(isset($_POST["insertBtn"])){

    $jobTitle = $_POST["jobTitle"];
    $jobField = $_POST["jobField"];
    $jobField1 = implode(",",$jobField);
    $duration = $_POST["duration"];
    $companyName = $_POST["companyName"];
  
    mysqli_query($conn, "INSERT INTO experience VALUES('','$seekerID','$jobTitle','$jobField1','$duration','$companyName')");
    ?>
    <script type="text/javascript">
     window.location="profile.php";
    </script>
    <?php
  }
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Experience</title>
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Add Experience</h2>
      <input type="text" name="jobTitle" id = "jobTitle" required value="" placeholder="Job Title"> <br>
      <input type="text" name="duration" id = "duration" required value=""placeholder="Job Duration"> <br>
      <input type="text" name="companyName" id = "companyName" required value=""placeholder="Company Name"> <br>
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
      <button name="insertBtn" type="submit" class="insertBtn">Insert</button>
    </form>
    </div>
<br>
<br> 
<br>
<br>
<br>

  </body>
</html>
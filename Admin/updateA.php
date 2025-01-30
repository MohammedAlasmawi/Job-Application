<?php
require 'config.php';
require 'headerC.html';

$applicationID = $_POST["applicationID"];

//$id = $_GET["id"];
$Title = "";
$Description = "";
$Field = "";
$Duration = "";

$res = mysqli_query($conn,"select * from application where applicationID = $applicationID");
while($row = mysqli_fetch_array($res)){

    $Title = $row["Title"];
    $Description = $row["Description"];
    $Field = $row["Field"];
    $Duration = $row["Duration"];
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
      <input type="text" name="applicationID" id = "applicationID" value="<?php echo $applicationID ?>" placeholder="jobTitle" readonly> <br>
      <input type="text" name="Title" id = "Title" value="<?php echo $Title ?>" placeholder="Title"> <br>
      <input type="text" name="Description" id = "Description" value="<?php echo $Description ?>" placeholder="Description"> <br>
      <br>
      <div class="fr_check">
      <label>Choose a Field: (You can select multiple)</label><br>
      <input name="Field[]" type="checkbox" value="ICT">ICT</input>
      <input name="Field[]" type="checkbox" value="Business">Business</input>
      <input name="Field[]" type="checkbox" value="Logistics">Logistics</input><br>
      <input name="Field[]" type="checkbox" value="Engineering">Engineering</input>
      <input name="Field[]" type="checkbox" value="Digital Marketing">Digital Marketing</input><br>
      <input name="Field[]" type="checkbox" value="Visual Design">Visual Design</input>
      <input name="Field[]" type="checkbox" value="Web Media">Web Media</input><br>
      <br>
      <p>Job Duration:</p>
      <input type="radio" id="part" name="Duration" value="Part-Time">
      <label for="part">Part-Time</label><br>
      <input type="radio" id="full" name="Duration" value="Full-Time">
      <label for="full">Full-Time</label><br>  
      <input type="radio" id="internship" name="Duration" value="internship">
      <label for="internship">internship</label><br><br>
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
<?php 
if(isset($_POST["updateBtn"])){

    $Field = $_POST["Field"]; 
    $Field1 = implode(",",$Field);
    mysqli_query($conn,"update application set Title='$_POST[Title]', Description='$_POST[Description]', Field = '$Field1', Duration='$_POST[Duration]'  where applicationID = $applicationID")
    ?>
    <script type="text/javascript">
     window.location="applications.php";
    </script>
    <?php
}

?>

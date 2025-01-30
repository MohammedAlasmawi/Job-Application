<?php
require 'config.php';
require 'headerS.html'; 
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  $q = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
  $row = mysqli_fetch_assoc($q);
  
}
else{
  header("Location: loginS.php");
}
$id = $_POST["applicationID"];
//$id = $_GET["id"];
$Title = "";
$Description = "";
$Field = "";
$Duration = "";

$res = mysqli_query($conn,"select * from application where applicationID = $id");
while($row = mysqli_fetch_array($res)){
    $applicationID = $id;
    $Title = $row["Title"];
    $Description = $row["Description"];
    $Field = $row["Field"];
    $Duration = $row["Duration"];
}

$q1 = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
while($row1 = mysqli_fetch_array($q1)){
    $seekerID = $row1["seekerID"];
}


if(isset($_POST["submit5"])){
    $coverLetter = $_FILES['coverLetter']['name'];
    $duplicate = mysqli_query($conn, "SELECT * FROM seeker_application WHERE seekerID = '$seekerID' and applicationID = '$applicationID'");
  
    if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('already registerd');</script>";
       
    }
    else{
        $query = "INSERT INTO seeker_application VALUES('','$applicationID','$seekerID','$coverLetter')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Successful'); </script>";
  
        
          $target = "coverLetter/".basename($coverLetter);
          if (move_uploaded_file($_FILES['coverLetter']['tmp_name'], $target)) {
                $msg = "uploaded successfully";
            }else{
                $msg = "Failed to upload";
        }
        header("Location: applicationsS.php");
    }
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
      <h2>Application</h2>
      <br>
      <div class="fr_check">
      <label>applicationID</label><br>
      <input type="text" name="applicationID" id = "applicationID" value="<?php echo $applicationID ?>" placeholder="applicationID" readonly> <br>
      <label>Title</label><br>
      <input type="text" name="Title" id = "Title" value="<?php echo $Title ?>" placeholder="Title" readonly> <br>
      <label>Description</label><br>
      <input type="text" name="Description" id = "Description" value="<?php echo $Description ?>" placeholder="Description" readonly> <br>
      <label>Field</label><br>
      <input type="text" name="Field" id = "Field" value="<?php echo $Field ?>" placeholder="Field" readonly> <br>
      <br>
      <label>Job Duration</label>
      <input type="text" name="Duration" id = "Duration" value="<?php echo $Duration ?>" placeholder="Duration" readonly> <br>
      <br>
      <label>Enter the Cover Letter: </label><br>
      <input type="file" name="coverLetter">
      <button name="submit5" type="submit" class="updateBtn">Insert</button>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
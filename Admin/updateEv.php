<?php
require 'config.php';
require 'headerA.html';
$AdminID = $_SESSION["AdminID"];
$id = $_GET["id"];
$location = "";
$time = "";
$date = "";
$title = "";
$description = "";

$res = mysqli_query($conn,"select * from event where eventID = $id");
while($row = mysqli_fetch_array($res)){

    $location = $row["location"];
    $time = $row["time"];
    $date = $row["date"];
    $title = $row["title"];
    $description = $row["description"];
    
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Applications</title>
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Edit Event</h2>
      <input type="text" name="title" id = "title" value="<?php echo $title ?>" placeholder="Title"> <br>
      <input type="text" name="location" id = "location"  placeholder="Location" value="<?php echo $location ?>"> <br>
      <input type="time" name="time" id = "time"  placeholder="time" value="<?php echo $time ?>"> <br>
      <input type="date" name="date" id = "date" placeholder="date" value="<?php echo $date ?>"> <br>
      <input type="text" name="description" id = "description" value="<?php echo $description ?>" placeholder="description"> <br>
      <input type="hidden" name="id" id = "id" value="<?php echo $id ?>" placeholder="id"> <br>
      <br>
      <div class="fr_check">
      <br>
      </div>
      <br>
      <button name="updateBtn" type="submit" class="inBtn">Update</button>
    </form>
    <br>
<br>
<br>
<br>
</head>
<?php 
if(isset($_POST["updateBtn"])){

    mysqli_query($conn,"update event set AdminID='$_SESSION[AdminID]', description='$_POST[description]', title='$_POST[title]', location='$_POST[location]', time='$_POST[time]', date='$_POST[date]'  where eventID = '$id'")
    
    ?>
    <script type="text/javascript">
     window.location="eventA.php";
    </script>
    <?php
}

?>

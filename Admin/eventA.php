<?php
require 'config.php';
require 'headerA.html';
if(!empty($_SESSION["AdminID"])){
  $AdminID = $_SESSION["AdminID"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = $AdminID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginA.php");
}

if(isset($_POST["submit"])){
    $location = $_POST["location"];
    $time = $_POST["time"];
    $date = $_POST["date"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $poster = $_FILES['poster']['name'];
    $duplicate = mysqli_query($conn, "SELECT * FROM event WHERE date = '$date'");
  
    if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('The date Has Already Taken'); </script>";
    }
    else{
        $query = "INSERT INTO `event` VALUES('','$AdminID','$title','$location','$date','$time','$description','$poster')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Successful'); </script>";
  
        
          $target = "posters/".basename($poster);
          if (move_uploaded_file($_FILES['poster']['tmp_name'], $target)) {
                $msg = "poster uploaded successfully";
            }else{
                $msg = "Failed to upload poster";
        }
    }
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
      <h2>Add Event</h2>
      <input type="text" name="title" id = "title" required value="" placeholder="Title"> <br>
      <input type="text" name="location" id = "location" required value="" placeholder="Location"> <br>
      <input type="time" name="time" id = "time" required value="" placeholder="time"> <br>
      <input type="date" name="date" id = "date" required value=""placeholder="date"> <br>
      <input type="text" name="description" id = "description" required value=""placeholder="description"> <br>
      <br>
      <div class="fr_check">
      <label>Enter Poster:</label>
      <br>
      <input type="file" name="poster">
      </div>
      <br>
      <button name="submit" type="submit" class="inBtn">Insert</button>
    </form>
  
</head>
<body>
  <div>
  <h2>Events Table</h2>            
  <table class="profileT5">
    <thead>
      <tr>
        <th>  </th>
        <th> Event ID </th>
        <th> Title </th>
        <th> Location </th>
        <th> Description </th>
        <th> Date </th>
        <th> Time </th>
        <th> Update </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM event");

      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='posters/".$row1['poster']."'></div>"; echo "</td>";
        echo "<td>"; echo $row1["eventID"]; echo "</td>";
        echo "<td>"; echo $row1["title"]; echo "</td>";
        echo "<td>"; echo $row1["location"]; echo "</td>";
        echo "<td>"; echo $row1["description"]; echo "</td>";
        echo "<td>"; echo $row1["date"]; echo "</td>";
        echo "<td>"; echo $row1["time"]; echo "</td>";
        echo "<td>"; ?><a href="updateEv.php?id=<?php echo $row1["eventID"];?>"><button type="button" class="updateBtn">Update</button></a> <?php echo"</td>";
        echo "<td>"; ?><a href="deleteEvent.php?id=<?php echo $row1["eventID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";

      }

      
      ?>
    </tbody>
  </table>
  <br>
<br>
<br>
<br>
<br>
</div>
<div>
  <h2>Company Register for Events </h2>            
  <table class="profileT5">
    <thead>
      <tr>
        <th>  </th>
        <th> Event ID </th>
        <th> companyID </th>
        <th> Company Name </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res1 = mysqli_query($conn, "SELECT * FROM company_event");

      while($row1 = mysqli_fetch_array($res1)){
        echo "<tr>";
        $companyID = $row1["companyID"];
        $res2 = mysqli_query($conn, "SELECT * FROM company where companyID = '$companyID'");
        while($row = mysqli_fetch_array($res2)){
        echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='images/".$row['Logo']."'></div>"; echo "</td>";
        echo "<td>"; echo $row1["eventID"]; echo "</td>";
        $eventID = $row1["eventID"];
        echo "<td>"; echo $row1["companyID"]; echo "</td>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        echo "<td>"; ?><form action="deleteEv.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="eventID" id = "eventID" value="<?php echo $eventID ?>"> <input type="hidden" name="companyID" id = "companyID" value="<?php echo $companyID ?>"><button name="submit" type="submit" class="Rbtn1">Delete</button></form><?php
      }
    }
      
      ?>
    </tbody>
  </table>
  <br>
<br>
<br>
<br>
<br>
</div>
</div>
<body>
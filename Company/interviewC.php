<?php
require 'config.php';
require 'headerC.html';
$seekerID = $_GET["id"];
if(!empty($_SESSION["companyID"])){
  $companyID = $_SESSION["companyID"];
  $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
  $row = mysqli_fetch_assoc($q);

}
else{
  header("Location: loginC.php");
}

if(isset($_POST["submit"])){
  $Location = $_POST["Location"];
  $Time = $_POST["Time"];
  $Date = $_POST["Date"];
  $Type = $_POST["Type"];
  $duplicate = mysqli_query($conn, "SELECT * FROM interview WHERE Date = '$Date' and Time = '$Time'");

  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('The Date or time Has Already Taken'); </script>";
  }
  else{
      $query = "INSERT INTO `interview` VALUES('','$Time','$Date','$Type','$Location','$seekerID','$companyID')";
      mysqli_query($conn, $query);
      echo "<script> alert('Registration Successful'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Applications</title>
<link rel="stylesheet" href="style.css?<?php echo Time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>

    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Add Interview</h2>
      <input type="text" name="Location" id = "Location" required value="" placeholder="Location"> <br>
      <input type="Time" name="Time" id = "Time" required value="" placeholder="Time"> <br>
      <input type="Date" name="Date" id = "Date" required value=""placeholder="Date"> <br>
      <br>
      <div class="fr_check">
      <label>Type</label><br>
      <select name="Type" id="Type">
        <option value="Online">Online</option>
        <option value="InPerson">InPerson</option>
      </select>
      </div>
      <br>
      <button name="submit" type="submit" class="inBtn">Insert</button>
    </form>
  
</head>
<body>
  <div>
  <h2>Interview Table</h2>            
  <table class="profileT5">
    <thead>
      <tr>
        <th> Location </th>
        <th> Date </th>
        <th> Time </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM interview WHERE companyID  = $companyID");

      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo $row1["Location"]; echo "</td>";
        echo "<td>"; echo $row1["Date"]; echo "</td>";
        echo "<td>"; echo $row1["Time"]; echo "</td>";
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
</html>

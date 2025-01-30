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
</head>
<body>
  <div class="appTable6">
  <h2>Interview Table</h2>            
  <table class="interviewTS">
    <thead>
      <tr>
      <th> Company Name </th>
        <th> Location/Platform </th>
        <th> Type </th>
        <th> Date </th>
        <th> Time </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM interview WHERE seekerID  = $seekerID");
      while($row1 = mysqli_fetch_array($res)){
      $companyID = $row1["companyID"];
      $res1 = mysqli_query($conn, "SELECT * FROM company WHERE companyID  = $companyID");
      while($row = mysqli_fetch_array($res1)){
        echo "<tr>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        echo "<td>"; echo $row1["Location"]; echo "</td>";
        echo "<td>"; echo $row1["Type"]; echo "</td>";
        echo "<td>"; echo $row1["Date"]; echo "</td>";
        echo "<td>"; echo $row1["Time"]; echo "</td>";
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
</html>

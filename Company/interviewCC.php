<?php
require 'config.php';
require 'headerC.html';
if(!empty($_SESSION["companyID"])){
  $companyID = $_SESSION["companyID"];
  $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
  $row = mysqli_fetch_assoc($q);

}
else{
  header("Location: loginC.php");
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
  <div class="appTable1" >
  <h2>Interview Table</h2>            
  <table class="profileT5">
    <thead>
      <tr>
      <th> Seeker Name </th>
        <th> Location </th>
        <th> Date </th>
        <th> Time </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM interview WHERE companyID  = $companyID");
      while($row1 = mysqli_fetch_array($res)){
        $seekerID = $row1["seekerID"];
        $res1 = mysqli_query($conn, "SELECT * FROM seeker WHERE seekerID  = $seekerID");
        while($row = mysqli_fetch_array($res1)){
        echo "<tr>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        echo "<td>"; echo $row1["Location"]; echo "</td>";
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

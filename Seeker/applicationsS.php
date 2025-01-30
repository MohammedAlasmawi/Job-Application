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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>

</head>
<body>
<div class="appTable5">
        <form method="post" class="dform2">
        
        <select name="search" id="search" class="select">
             <option value="">---Choose Field</option>
             <option value="ICT">ICT</option>
             <option value="Engineering">Engineering</option>
             <option value="Business">Business</option>
             <option value="Logistics">Logistics</option>
             <option value="Digital Marketing">Digital Marketing</option>
             <option value="Visual Design">Visual Design</option>
             <option value="Web Media">Web Media</option>
        </select>
        <select name="intr" id="intr" class="select">
             <option value="">---Duration</option>
             <option value="Full-Time">Full-Time</option>
             <option value="Part-Time">Part-Time</option>
             <option value="internship">internship</option>
        </select>
        <input type="submit" name="submit" class="updateBtn">
        <br>
        <br>

        </form>
    </div>
  <div class="appTable2">
  <h2>Applications</h2>
           <?php
               if (isset($_POST["submit"])) {
                  $str = $_POST["search"];
                  $intr = $_POST["intr"];
                      $res = mysqli_query($conn, "SELECT * FROM application WHERE
                      (
                         LOCATE(',$str,', CONCAT(',',Field,','))>0 AND
                         LOCATE(',$intr,', CONCAT(',',Duration,','))>0
                      );");
             ?>
            <table class="profileT5">
                 <thead>
                     <tr>
                        <th> </th>
                        <th> Company name </th>
                        <th> Application Name </th>
                        <th> Field </th>
                        <th> Description </th>
                        <th> Duration </th>
                        <th> Apply </th>
                     </tr>
                 </thead>
        <?php
     while($row1 = mysqli_fetch_array($res)){
      echo "<tr>";
      $applicationID = $row1["applicationID"];
      $companyID = $row1["companyID"];
      $res2 = mysqli_query($conn, "SELECT * FROM company where `companyID` = '$companyID'");
      while($row2 = mysqli_fetch_array($res2)){
      echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='images/".$row2['Logo']."'></div>"; echo "</td>";
      $applicationID = $row1["applicationID"];
      echo "<td>"; echo $row2["Name"]; echo "</td>";
      echo "<td>"; echo $row1["Title"]; echo "</td>";
      echo "<td>"; echo $row1["Field"]; echo "</td>";
      echo "<td>"; echo $row1["Description"]; echo "</td>";
      echo "<td>"; echo $row1["Duration"]; echo "</td>";
      echo "<td>"; ?><form action="apply.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="applicationID" id = "applicationID" value="<?php echo $applicationID ?>"><button name="submit" type="submit" class="Rbtn1">Apply</button></form><?php
      }
    }





  }
    

               ?>
  </table>
  </div>
  
  <br>
    <br>
    <br>
    <br>
    <br>
  </body>
</html>

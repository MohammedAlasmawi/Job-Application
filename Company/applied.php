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
if(isset($_POST["submit"])){$seekerID = $_POST["seekerID"];}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>

</head>
<body>
  <div class="appTable3">
  <h2>Applications</h2>            
    <table class="profileT5">
      <thead>
         <tr>
         
         <th> Seeker name </th>
         <th> Application Name </th>
         <th> Field </th>
         <th> Duration </th>
         <th>Interview </th>
         <th>Details</th>
         <th>Letter</th>
        </tr>
      </thead>
     <tbody>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM application where `companyID` = '$companyID'");
      
         while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        $applicationID = $row1["applicationID"];
        $res1 = mysqli_query($conn, "SELECT * FROM seeker_application where `applicationID` = '$applicationID'");
        while($row = mysqli_fetch_array($res1)){
        $res2 = mysqli_query($conn, "SELECT * FROM company where `companyID` = '$companyID'");
        while($row2 = mysqli_fetch_array($res2)){
        $seekerID = $row["seekerID"];
        $res5 = mysqli_query($conn, "SELECT * FROM seeker where `seekerID` = '$seekerID'");
        while($row5 = mysqli_fetch_array($res5)){
          echo "<td>"; echo $row5["Name"]; echo "</td>";
          $seekerID1 = $row5["seekerID"];
       }
        echo "<td>"; echo $row1["Title"]; echo "</td>";
        echo "<td>"; echo $row1["Field"]; echo "</td>";
        echo "<td>"; echo $row1["Duration"]; echo "</td>";
        echo "<td>"; ?><a href="interviewC.php?id=<?php echo $row["seekerID"];?>"><button type="button" class="updateBtn">Interview</button></a><?php
        echo "<td>"; ?><form action="seekerDetails.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Details</button></form><?php
        echo "<td>"; ?><a href="C/<?php echo $row["coverLetter"] ?>"><button type="button" class="updateBtn">Cover Letter</button></a> <?php echo"</td>";
        echo "<tr>";
        }
       } 
       
      }
      
        ?>
      </tbody>
  </table>
  </div>
  
  </body>
</html>

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


$test = mysqli_query($conn, "SELECT C FROM seeker_profile WHERE `seekerID` = '$seekerID'");
$test2 = mysqli_fetch_array($test); 
$test3 = $test2["C"];
if(isset($_POST["submit"])){$experienceID = $_POST["experienceID"];}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Profile</title>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
    <script type="text/javascript">
        function showHideRow(row) {
            $("#" + row).toggle();
        }
    </script>
  </head>
<body>
  <div class="buttonD">
    <br>
    <br>
    <button onclick="toggle(this)" class="profileBtn">Hide Profile</button>
    <br>
    <button onclick="to(this)" class="profileBtn">Experience</button>
    <br>
    <button onclick="tog(this)" class="profileBtn">Education</button>
    <br>
    <button onclick="togg(this)" class="profileBtn">Certificates</button>
    <br>
    <button onclick="toggl(this)" class="profileBtn">Information</button>
  </div>
  <div class ="d4">
    <h2>Coming Events</h2>            
    <table>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM event");

      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<th></th>";
        echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='posters/".$row1['poster']."'></div>"; echo "</td>";
        echo "</tr>";
        $eventID = $row1["eventID"];
        echo "<tr>";
        echo "<th>Title</th>";
        echo "<td>"; echo $row1["title"]; echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Location</th>";
        echo "<td>"; echo $row1["location"]; echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Timing</th>";
        echo "<td>"; echo $row1["date"]; echo "</td>";
        echo "<td>"; echo $row1["time"]; echo "</td>";
        echo "</tr>";
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
<div class="d3">
    <!-- <div>
      <h2>Seeker</h2>            
      <table>
        <thead>
          <tr>
            <th> Seeker ID </th>
            <th> Name </th>
            <th> Email </th>
          </tr>
        </thead>
        <tbody>
          <?php
        //   echo $companyID;
          $res = mysqli_query($conn, "SELECT * FROM seeker WHERE `Email` = '$Email'");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["seekerID"]; echo "</td>";
            echo "<td>"; echo $row1["Name"]; echo "</td>";
            echo "<td>"; echo $row1["Email"]; echo "</td>";

          }
        
          
          ?>
        </tbody>
      </table>
    </div> -->
    <div class="collapse" id="mydiv">          
      <table class="profileT5">
        <thead>
          <tr>
            <th> Seeker ID </th>
            <th> C.V </th>
            <th> Update </th>
            <th> Download </th>
          
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM seeker_profile WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["seekerID"]; echo "</td>";
            echo "<td>"; echo $row1["C"]; echo "</td>";
            echo "<td>"; ?><form action="updateC.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php
            echo "<td>"; ?><a href="C/<?php echo $test2["C"] ?>"><button type="button" class="updateBtn">Download</button></a> <?php echo"</td>";
          }
        
          
          ?>
        </tbody>
      </table>
    </div>
    <div class="collapse" id="mydiv1" hidden="hidden">
     <h2>Experience</h2>       
      <table class="profileT5">
        <thead>
          <tr>
            <th> job Title </th>
            <th> job Field </th>
            <th> Duration</th>
            <th> Company name </th>
            <th> Update </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM experience WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            $experienceID = $row1["experienceID"];
            echo "<td>"; echo $row1["jobTitle"]; echo "</td>";
            echo "<td>"; echo $row1["jobField"]; echo "</td>";
            echo "<td>"; echo $row1["duration"]; echo "</td>";
            echo "<td>"; echo $row1["companyName"]; echo "</td>";
            echo "<td>"; ?><form action="updateE.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="experienceID" id = "experienceID" value="<?php echo $experienceID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php
            echo "<td>"; ?><a href="deleteE.php?id=<?php echo $row1["experienceID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";
            

          }
          ?>
        </tbody>
      </table>
      <button type="button" class="updateBtn1" onclick="window.location.href='insertE.php'">insert</button>

    </div>
    <div class="collapse" id="mydiv2" hidden="hidden">
      <h2>Education </h2>       
      <table class="profileT5">
        <thead>
          <tr>
            <th> Major title </th>
            <th> Major Field </th>
            <th> GPA </th>
            <th> Update </th>
            <th> Delete </th>
          
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM education WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            $educationID = $row1["educationID"];
            echo "<td>"; echo $row1["majorTitle"]; echo "</td>";
            echo "<td>"; echo $row1["majorField"]; echo "</td>";
            echo "<td>"; echo $row1["GPA"]; echo "</td>";
            echo "<td>"; ?><form action="updateD.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="educationID" id = "educationID" value="<?php echo $educationID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php
            echo "<td>"; ?><a href="deleteD.php?id=<?php echo $row1["educationID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";

          }
        
          
          ?>
        </tbody>
      </table>
      <button type="button" class="updateBtn1" onclick="window.location.href='insertD.php'">insert</button>
    </div>
    <div class="collapse" id="mydiv3" hidden="hidden">
      <h2>Certificates </h2>            
      <table class="profileT5">
        <thead>
          <tr>
            <th> Certificate ID </th>
            <th> Certificate Title </th>
            <th> Certificate Field </th>
            <th> Certificate source </th>
            <th> Update </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM certificate WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["certificateID"]; echo "</td>";
            $certificateID  = $row1["certificateID"];
            echo "<td>"; echo $row1["certificateTitle"]; echo "</td>";
            echo "<td>"; echo $row1["certificateField"]; echo "</td>";
            echo "<td>"; echo $row1["resource"]; echo "</td>";
            echo "<td>"; ?><form action="updateF.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="certificateID" id = "certificateID" value="<?php echo $certificateID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php
            echo "<td>"; ?><a href="deleteF.php?id=<?php echo $row1["certificateID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";

          }
        
          
          ?>
        </tbody>
      </table>
      <button type="button" class="updateBtn1" onclick="window.location.href='insertF.php'">insert</button>
    </div>
    <div class="collapse" id="mydiv4" hidden="hidden">
      <h2>Information </h2>            
      <table class="profileT5">
        <thead>
          <tr>
            <th> Full name </th>
            <th> Gender</th>
            <th> Mobile Number </th>
            <th> Skills  </th>
            <th> Availability  </th>
            <th> Update </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM information WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["fullName"]; echo "</td>";
            echo "<td>"; echo $row1["gender"]; echo "</td>";
            echo "<td>"; echo $row1["mobileNumber"]; echo "</td>";
            echo "<td>"; echo $row1["skills"]; echo "</td>";
            echo "<td>"; echo $row1["Availability"]; echo "</td>";
            echo "<td>"; ?><form action="updateI.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php

          }
          
          
          
          ?>
        </tbody>
      </table>
      
    </div>
    <br>
      <br>
      <br>
      <br>
      <br>
      <br>
</div>
<script src="profile.js"></script>

</body>
<html>
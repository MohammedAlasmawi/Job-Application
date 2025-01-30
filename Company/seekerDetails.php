<?php
require 'config.php';
require 'headerC.html';
//$seekerID = $_GET['id'];
$seekerID = $_POST["seekerID"];  

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
<title>Profile</title>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
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
  
<div class="d5">
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
          
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM seeker_profile WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["seekerID"]; echo "</td>";
            echo "<td>"; ?><a href="C/<?php echo $row1["C"] ?>"><button type="button" class="updateBtn">Download</button></a> <?php echo"</td>";
           
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
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM experience WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
        
            echo "<td>"; echo $row1["jobTitle"]; echo "</td>";
            echo "<td>"; echo $row1["jobField"]; echo "</td>";
            echo "<td>"; echo $row1["duration"]; echo "</td>";
            echo "<td>"; echo $row1["companyName"]; echo "</td>";
            

          }
          ?>
        </tbody>
      </table>
      

    </div>
    <div class="collapse" id="mydiv2" hidden="hidden">
      <h2>Education </h2>       
      <table class="profileT5">
        <thead>
          <tr>
        
            <th> Major title </th>
            <th> Major Field </th>
          
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM education WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
           
            echo "<td>"; echo $row1["majorTitle"]; echo "</td>";
            echo "<td>"; echo $row1["majorField"]; echo "</td>";
          }
        
          
          ?>
        </tbody>
      </table>
      
    </div>
    <div class="collapse" id="mydiv3" hidden="hidden">
      <h2>Certificates </h2>            
      <table class="profileT5">
        <thead>
          <tr>
            <th> Certificate Title </th>
            <th> Certificate Field </th>
            <th> Certificate source </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $res = mysqli_query($conn, "SELECT * FROM certificate WHERE seekerID = $seekerID");
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["certificateTitle"]; echo "</td>";
            echo "<td>"; echo $row1["certificateField"]; echo "</td>";
            echo "<td>"; echo $row1["resource"]; echo "</td>";
          }
        
          
          ?>
        </tbody>
      </table>
      
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
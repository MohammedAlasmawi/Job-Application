<?php
require 'headerC.html';
require 'config.php'; 

if(!empty($_SESSION["companyID"])){
  $companyID = $_SESSION["companyID"];
  $q = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginC.php");
}
if(isset($_POST["insertBtn"])){
  $companyID = $_POST["companyID"];
  $eventID = $_POST["eventID"];
  $duplicate = mysqli_query($conn, "SELECT * FROM company_event WHERE companyID = '$companyID'");

  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('You are already registerd'); </script>";
  }
  else{
      $query = "INSERT INTO company_event VALUES('','$companyID','$eventID')";
      mysqli_query($conn, $query);
      echo "<script> alert('Registration Successful'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<head>
</head> 
<body>
<div class="d1">
  <div  class="appTable4">
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
        <th> Register </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM event");

      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='posters/".$row1['poster']."'></div>"; echo "</td>";
        echo "<td>"; echo $row1["eventID"]; echo "</td>";
        $eventID = $row1["eventID"];
        echo "<td>"; echo $row1["title"]; echo "</td>";
        echo "<td>"; echo $row1["location"]; echo "</td>";
        echo "<td>"; echo $row1["description"]; echo "</td>";
        echo "<td>"; echo $row1["date"]; echo "</td>";
        echo "<td>"; echo $row1["time"]; echo "</td>";
        echo "<td>"; ?><a href="registerE.php?id=<?php echo $row1["eventID"];?>"><button type="button" class="updateBtn">Register</button></a><?php
        
        
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
<div  class="appTable3">
  <h2>Event Schedule</h2>            
  <table class="profileT5">
    <thead>
      <tr>
        <th> Event ID </th>
        <th> Title </th>
        <th> Date </th>
        <th> Time </th>
        <th> Delete </th>
      </tr>
    </thead>
    <tbody>
      <?php
      $res = mysqli_query($conn, "SELECT * FROM company_event where companyID = $companyID");
      
      
      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo $row1["eventID"]; echo "</td>";
        $eventID  = $row1["eventID"];
        $res1 = mysqli_query($conn, "SELECT * FROM event where eventID = $eventID");
        while($row = mysqli_fetch_array($res1)){
        echo "<td>"; echo $row["title"]; echo "</td>";
        echo "<td>"; echo $row["date"]; echo "</td>";
        echo "<td>"; echo $row["time"]; echo "</td>";
        echo "<td>"; ?><a href="deleteCev.php?id=<?php echo $row1["eventID"];?>"><button type="button" class="updateBtn">Delete</button></a> <?php echo"</td>";
        
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
      <br>
</div>


<body>
</html>


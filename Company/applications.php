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
if(isset($_POST["insertBtn"])){

    $Title = $_POST["Title"];
    $Description = $_POST["Description"];
    $Field = $_POST["Field"];
    $Field1 = implode(",",$Field);
    $Duration = $_POST["Duration"];
  
    mysqli_query($conn, "INSERT INTO application VALUES('','$companyID','$Title','$Field1','$Description','$Duration')");
  
  }
 if(isset($_POST["submit"])){$seekerID = $_POST["seekerID"];}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Applications</title>
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Add / Edit / Delete Application</h2>
      <input type="text" name="Title" id = "Title" required value="" placeholder="Title"> <br>
      <input type="text" name="Description" id = "Description" required value=""placeholder="Description"> <br>
      <br>
      <div class="fr_check">
      <label>Choose a Field: (You can select multiple)</label><br>
      <input name="Field[]" type="checkbox" value="ICT">ICT</input>
      <input name="Field[]" type="checkbox" value="Business">Business</input>
      <input name="Field[]" type="checkbox" value="Logistics">Logistics</input><br>
      <input name="Field[]" type="checkbox" value="Engineering">Engineering</input>
      <input name="Field[]" type="checkbox" value="Digital Marketing">Digital Marketing</input><br>
      <input name="Field[]" type="checkbox" value="Visual Design">Visual Design</input>
      <input name="Field[]" type="checkbox" value="Web Media">Web Media</input><br>
      </div>
      <br>
      <div class="duration">
      <p>Job Duration:</p>
      <input type="radio" id="part" name="Duration" value="Part-Time">
      <label for="part">Part-Time</label><br>
      <input type="radio" id="full" name="Duration" value="Full-Time">
      <label for="full">Full-Time</label><br>  
      <input type="radio" id="internship" name="Duration" value="internship">
      <label for="internship">internship</label><br><br>
      <br>
      <button name="insertBtn" type="submit" class="insertBtn">Insert</button>
      </div>
    </form>
  </div>
<br>
<br> 
<br>
<br>
<br>
<link rel="stylesheet" href="style.css">
<div class="appTable">
  <h2>Applications Table</h2>            
  <table class="profileT1">
    <thead>
      <tr>
        <th>  </th>
        <th> Application ID </th>
        <th> Application Name </th>
        <th> Field </th>
        <th> Description </th>
        <th> Duration </th>
        <th> Update </th>
        <th> Delete </th>
      </tr>
    </thead> 
    <tbody>
      <?php
    //   echo $companyID;
      $res = mysqli_query($conn, "SELECT * FROM application WHERE companyID = $companyID");
      $res1 = mysqli_query($conn, "SELECT * FROM company WHERE companyID = $companyID");
      //echo $row1 = mysqli_fetch_assoc($res); 
      while($row2 = mysqli_fetch_array($res1)){
      while($row1 = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='images/".$row['Logo']."'></div>"; echo "</td>";
        echo "<td>"; echo $row1["applicationID"]; echo "</td>";
        $applicationID = $row1["applicationID"];
        echo "<td>"; echo $row1["Title"]; echo "</td>";
        echo "<td>"; echo $row1["Field"]; echo "</td>";
        echo "<td>"; echo $row1["Description"]; echo "</td>";
        echo "<td>"; echo $row1["Duration"]; echo "</td>";
        echo "<td>"; ?><form action="updateA.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="applicationID" id ="applicationID" value="<?php echo $applicationID ?>"><button name="submit" type="submit" class="Rbtn1">Update</button></form><?php
        echo "<td>"; ?><a href="deleteA.php?id=<?php echo $row1["applicationID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";
      }
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
<?php 



?>
  </body>
</html> 
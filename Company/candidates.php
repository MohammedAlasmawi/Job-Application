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
    <div class="appTable2">
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
             <option value="">---preferred categories</option>
             <option value="experience">experience</option>
             <option value="certificate">certificate</option>
             <option value="education">education</option>
        </select>
        <input type="submit" name="submit" class="updateBtn">
        <br>
        <br>

        </form>
    </div>
  <div class="appTable1">
        <h2>Candidates Table</h2>            
  
         <tbody>
           <?php
               if (isset($_POST["submit"])) {
                if ($_POST["intr"] == 'experience') {
                  $str = $_POST["search"];
                      $res = mysqli_query($conn, "SELECT DISTINCT seekerID FROM experience WHERE
                      (
                         LOCATE(',$str,', CONCAT(',',jobField,','))>0 OR
                         LOCATE(',$str,', CONCAT(',',jobField,','))>0
                      );");
             ?>
            <table class="profileT5">
                 <thead>
                     <tr>
                        <th> Name </th>
                        <th> jobField </th>
                        <th> Details </th>
                     </tr>
                 </thead>
        <?php
      while($row1 = mysqli_fetch_array($res)){
        $seekerID = $row1["seekerID"];
        $res3 = mysqli_query($conn, "select Availability from information where seekerID = '$seekerID'");
        while($row2 = mysqli_fetch_array($res3)){
        $Availability = $row2["Availability"];
        if($Availability == 'Yes'){
        $res2 = mysqli_query($conn, "select Name from seeker where seekerID = '$seekerID'");
        while($row = mysqli_fetch_array($res2)){
        echo "<tr>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        echo "<td>"; echo $str; echo "</td>";
        echo "<td>"; ?><form action="seekerDetails.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Details</button></form><?php
      }
    }
}
    }
}
    elseif($_POST["intr"] == 'certificate'){
        $str = $_POST["search"];
        $res = mysqli_query($conn, "SELECT DISTINCT seekerID FROM certificate WHERE
        (
            LOCATE(',$str,', CONCAT(',',certificateField,','))>0 OR
            LOCATE(',$str,', CONCAT(',',certificateField,','))>0
        );");
        ?>
        <table>
             <thead>
                 <tr>
                    <th> Name </th>
                    <th> certificateField </th>
                    <th> Details </th>
                 </tr>
             </thead>
    <?php
      while($row1 = mysqli_fetch_array($res)){
        $seekerID = $row1["seekerID"];
        $res3 = mysqli_query($conn, "select Availability from information where seekerID = '$seekerID'");
        while($row2 = mysqli_fetch_array($res3)){
        $Availability = $row2["Availability"];
        if($Availability == 'Yes'){
        $res2 = mysqli_query($conn, "select Name from seeker where seekerID = '$seekerID'");
        while($row = mysqli_fetch_array($res2)){
        echo "<tr>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        echo "<td>"; echo $str; echo "</td>";
        echo "<td>"; ?><form action="seekerDetails.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Details</button></form><?php
      }
    }
}
      }
}
    elseif($_POST["intr"] == 'education'){
        $str = $_POST["search"];
        $res = mysqli_query($conn, "SELECT DISTINCT seekerID FROM education WHERE
        (
            LOCATE(',$str,', CONCAT(',',majorField,','))>0 
        );");
        ?>
        <table class="profileT5">
             <thead>
                 <tr>
                    <th> Name </th>
                    <th> Major Field </th>
                    <th> Details </th>
                 </tr>
             </thead>
    <?php
      while($row1 = mysqli_fetch_array($res)){
        $seekerID = $row1["seekerID"];
        $res3 = mysqli_query($conn, "select Availability from information where seekerID = '$seekerID'");
        while($row2 = mysqli_fetch_array($res3)){
        $Availability = $row2["Availability"];
        if($Availability == 'Yes'){
        $res2 = mysqli_query($conn, "select Name from seeker where seekerID = '$seekerID'");
        while($row = mysqli_fetch_array($res2)){
        echo "<tr>";
        echo "<td>"; echo $row["Name"]; echo "</td>";
        //echo "<td>"; echo $row1["seekerID"]; echo "</td>";
        echo "<td>"; echo $str; echo "</td>";
        echo "<td>"; ?><form action="seekerDetails.php" method="post" autocomplete="off" id="form" enctype="multipart/form-data"><input type="hidden" name="seekerID" id = "seekerID" value="<?php echo $seekerID ?>"><button name="submit" type="submit" class="Rbtn1">Details</button></form><?php
      }
    }
}
}
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
</body>
</html>
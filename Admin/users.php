<?php 
require 'config.php';
require 'headerA.html';
if(!empty($_SESSION["AdminID"])){
  $AdminID = $_SESSION["AdminID"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = $AdminID");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: loginA.php");
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
  </head>
  </div>
        <div class="adminU1">
        <form method="post" class="dform2">
        
        <select name="search" id="search" class="select">
            <option>---Seeker</option>
        <?php 
            $q2 = mysqli_query($conn, "SELECT * FROM seeker");
            while($row1 = mysqli_fetch_array($q2)){
            echo "<option>"; echo $row1["Email"]; echo "</option>" ;
            }
            ?>
        </select>
        <input type="submit" name="submit1" class="updateBtn">
        <br>
        <br>

        </form>
        </div>
<div class="adminU1" id="mydiv1">
     <h2>Seekers</h2>
     <?php
               if (isset($_POST["submit1"])) {
                  $str = $_POST["search"];
                  $res = mysqli_query($conn, "SELECT * FROM seeker WHERE
                  (
                     LOCATE(',$str,', CONCAT(',',Email,','))>0
                  );");
             ?>       
      <table class="profileT5">
        <thead>
          <tr>
            <th> seeker ID </th>
            <th> Name </th>
            <th> Email </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["seekerID"]; echo "</td>";
            $seekerID = $row1["seekerID"];
            echo "<td>"; echo $row1["Name"]; echo "</td>";
            echo "<td>"; echo $row1["Email"]; echo "</td>";
            echo "<td>"; ?><a href="deleteSeeker.php?id=<?php echo $row1["seekerID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";

          }
        }
          ?>
        </tbody>
      </table>
        </div>



        
        <div class="adminU2">
        <form method="post" class="dform2">
        
        <select name="search" id="search" class="select">
            <option>---Company CR</option>
        <?php 
            $q2 = mysqli_query($conn, "SELECT * FROM company");
            while($row1 = mysqli_fetch_array($q2)){
            echo "<option>"; echo $row1["companyCR"]; echo "</option>" ;
            }
            ?>
        </select>
        <input type="submit" name="submit" class="updateBtn">
        </form>
    </div>
  <div class="adminU2">
  <h2>Companies</h2>
           <?php
               if (isset($_POST["submit"])) {
                  $str = $_POST["search"];
                  $res = mysqli_query($conn, "SELECT * FROM company WHERE
                  (
                     LOCATE(',$str,', CONCAT(',',companyCR,','))>0
                  );");
             ?>
            <table class="profileT5">
                 <thead>
                     <tr>
                        <th> </th>
                        <th> Company ID </th>
                        <th> Company CR </th>
                        <th> Company Name </th>
                        <th> Email </th>
                        <th> Phone </th>
                        <th> Field </th>
                        <th> Delete </th>
                     </tr>
                 </thead>
        <?php
     while($row1 = mysqli_fetch_array($res)){
      echo "<tr>";
      $companyID = $row1["companyID"];
      echo "<td>"; echo "<div class ='imgB'><img class='logo2' src='images/".$row1['Logo']."'></div>"; echo "</td>";
      echo "<td>"; echo $row1["companyID"]; echo "</td>";
      echo "<td>"; echo $row1["companyCR"]; echo "</td>";
      echo "<td>"; echo $row1["Name"]; echo "</td>";
      echo "<td>"; echo $row1["Email"]; echo "</td>";
      echo "<td>"; echo $row1["Phone"]; echo "</td>";
      echo "<td>"; echo $row1["Field"]; echo "</td>";
      echo "<td>"; ?><a href="deleteCompany.php?id=<?php echo $row1["companyID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";
      }
    }

               ?>
  </table>
  </div>




<br>

        <br>
        <div class="adminU1">
        <form method="post" class="dform2">
        
        <select name="search" id="search" class="select">
            <option>---Admin</option>
        <?php 
            $q3 = mysqli_query($conn, "SELECT * FROM admin");
            while($row1 = mysqli_fetch_array($q3)){
            echo "<option>"; echo $row1["AdminID"]; echo "</option>" ;
            }
            ?>
        </select>
        <input type="submit" name="submit2" class="updateBtn">
        <br>
        <br>

        </form>
        </div>
<div class="adminU1" id="mydiv1">
     <h2>Admin</h2>
     <?php
               if (isset($_POST["submit2"])) {
                  $str = $_POST["search"];
                  $res = mysqli_query($conn, "SELECT * FROM admin WHERE
                  (
                     LOCATE(',$str,', CONCAT(',',AdminID,','))>0
                  );");
             ?>       
      <table class="profileT5">
        <thead>
          <tr>
            <th> Admin ID </th>
            <th> Name </th>
            <th> Delete </th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row1 = mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row1["AdminID"]; echo "</td>";
            $AdminID = $row1["AdminID"];
            echo "<td>"; echo $row1["Name"]; echo "</td>";
            echo "<td>"; ?><a href="deleteAdmin.php?id=<?php echo $row1["AdminID"];?>"><button type="button" class="deleteBtn">Delete</button></a> <?php echo"</td>";

          }
        }
          ?>
        </tbody>
      </table>
      <button type="button" class="inBtn" onclick="window.location.href='insertA.php'">insert</button>
        </div>
    </body>
<html>
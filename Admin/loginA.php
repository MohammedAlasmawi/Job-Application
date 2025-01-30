<?php
require 'config.php'; 
require 'header.html';

if(!empty($_SESSION["AdminID"])){
  header("Location: applicationA.php");
}
if(isset($_POST["submit"])){
  $AdminID = $_POST["AdminID"];
  $Password = $_POST["Password"];
  $hashed = hash('sha512',$Password);
  $result = mysqli_query($conn, "SELECT * FROM Admin WHERE AdminID = '$AdminID'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    $hashed = hash('sha512',$Password);
    if($hashed == $row['Password']){
      $_SESSION["login"] = true;
      $_SESSION["AdminID"] = $row["AdminID"];
      header("Location: applicationA.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

  <div class= "lform">
    <h2>Admin Login</h2>
    
    <form class="" action="" method="post" autocomplete="off">
      <label for="AdminID"> </label>
      <input type="text" name="AdminID" AdminID = "AdminID" required value="" placeholder="AdminID"> <br>
      <label for="Password"> </label>
      <input type="password" name="Password" AdminID = "Password" required value="" placeholder="Password"> <br>
      <button type="submit" name="submit" class="subbtn" >Submit</button>
    </form>
  </div>
    <br>

  </body>
</html>
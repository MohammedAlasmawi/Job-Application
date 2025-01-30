<?php
require 'config.php';
require 'header.html';

if(!empty($_SESSION["companyID"])){
  header("Location: indexC.php");
}
if(isset($_POST["submit"])){
  $companyCR = $_POST["companyCR"];
  $Password = $_POST["Password"];
  $hashed = hash('sha512',$Password);
  $result = mysqli_query($conn, "SELECT * FROM company WHERE companyCR = '$companyCR'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    $hashed = hash('sha512',$Password);
    if($hashed == $row['Password']){
      $_SESSION["login"] = true;
      $_SESSION["companyID"] = $row["companyID"];
      header("Location: applications.php");
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
    <h2>Company Login</h2>
    
    <form class="" action="" method="post" autocomplete="off">
      <label for="companyID"> </label>
      <input type="text" name="companyCR" required value="" placeholder="companyCR"> <br>
      <label for="Password"> </label>
      <input type="password" name="Password" companyID = "Password" required value="" placeholder="Password"> <br>
      <button type="submit" name="submit" class="subbtn" >Submit</button>
    </form>
  </div>
    <br>

  </body>
</html>
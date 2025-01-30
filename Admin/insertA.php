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

if(isset($_POST["insertBtn"])){

    $Name = $_POST["Name"];
    $Password = $_POST["Password"];
    $uppercase = preg_match('@[A-Z]@', $Password);
     $lowercase = preg_match('@[a-z]@', $Password);
     $number    = preg_match('@[0-9]@', $Password);
     $specialChars = preg_match('@[^\w]@', $Password);
     $hashed = hash('sha512',$Password);
     if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
        ?><div> <p>"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character"</p></div><?php
       }else{
    mysqli_query($conn, "INSERT INTO admin VALUES('','$Name','$hashed')");
    ?>
    <script type="text/javascript">
     window.location="users.php";
    </script>
    <?php
}
    
  }
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Admin</title>
<link rel="stylesheet" href="style.css?<?php echo time();?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<head>
  <body>
    <br>
    <br>
  <div class="d1">
    <form class="dform" action="" method="post" id="form" enctype="multipart/form-data">
      <h2>Add Admin</h2>
      <input type="text" name="Name" id = "Name" required value="" placeholder="Name"> <br>
      <input type="password" name="Password" id = "Password" required value=""placeholder="Password"> <br>
      <br>
      <br>
      <button name="insertBtn" type="submit" class="subbtn">Insert</button>
    </form>
    </div>
<br>
<br> 
<br>
<br>
<br>

  </body>
</html>
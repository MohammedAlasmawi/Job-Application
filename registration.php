<?php
require 'config.php';
require 'header.html';
$msg = "";
if(!empty($_SESSION["id"])){
  header("Location: registration.php");
}
if(isset($_POST["submit"])){
  $companyCR = $_POST["companyCR"];
  $Name = $_POST["Name"];
  $Password = $_POST["Password"];
  $Email = $_POST["Email"];
  $Phone = $_POST["Phone"];
  $Field = $_POST["Field"];
  $Field1 = implode(",",$Field);
  $Logo = $_FILES['Logo']['name'];
  $duplicate = mysqli_query($conn, "SELECT * FROM company WHERE companyCR = '$companyCR'");
  $uppercase = preg_match('@[A-Z]@', $Password);
  $lowercase = preg_match('@[a-z]@', $Password);
  $number    = preg_match('@[0-9]@', $Password);
  $specialChars = preg_match('@[^\w]@', $Password);
  $hashed = hash('sha512',$Password);

  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('companyCR Has Already Taken'); </script>";
  }
  else{
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
      ?><div> <p>"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character"</p></div><?php
     }else{
      $query = "INSERT INTO company VALUES('','$companyCR','$Name','$hashed','$Email','$Phone','$Field1','$Logo')";
      mysqli_query($conn, $query);
      echo "<script> alert('Registration Successful'); </script>";

      
  	  $target = "images/".basename($Logo);
        if (move_uploaded_file($_FILES['Logo']['tmp_name'], $target)) {
  		    $msg = "Image uploaded successfully";
  	    }else{
  		    $msg = "Failed to upload image";
  	}
   }
  }
}
if(isset($_POST["submit1"])){
  $Name = $_POST["Name"];
  $Password = $_POST["Password"];
  $Email = $_POST["Email"];
  $uppercase = preg_match('@[A-Z]@', $Password);
  $lowercase = preg_match('@[a-z]@', $Password);
  $number    = preg_match('@[0-9]@', $Password);
  $specialChars = preg_match('@[^\w]@', $Password);
  $hashed = hash('sha512',$Password);
  $duplicate = mysqli_query($conn, "SELECT * FROM seeker WHERE Email = '$Email'");
//   foreach($Field as $Field1){
//     echo $Field1.",";
// }
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email Has Already Taken'); </script>";
  }
  else{
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
      ?><div> <p>"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character"</p></div><?php
     }else{
      $query = "INSERT INTO seeker VALUES('','$Name','$hashed','$Email')";
      mysqli_query($conn, $query);
      echo "<script> alert('Registration Successful'); </script>";
     }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css?<?php echo time();?>">
  </head>
  <body>
    <div class="dregFs">
    <button id="btn" type="submit" class="Cbtn">Company Register</button>
    <button id="btn1" type="submit" class="Sbtn">Job Seeker Register</button>
    </div>
    <div class="d1">
    <form class="dform" action="" method="post" autocomplete="off" id="form" enctype="multipart/form-data">
      <h2>Job Seeker Registration</h2>
      <input type="text" name="Name" id = "Name" required value="" placeholder="Seeker Name"> <br>
      <input type="Password" name="Password" id = "Password" required value="" placeholder="Password"> <br>
      <input type="email" name="Email" id = "Email" required value=""placeholder="Email"> <br>
      <button name="submit1" type="submit" class="Rbtn">Register</button>
    </form> 
    <form class="dform1" action="" method="post" autocomplete="off" id="form1" enctype="multipart/form-data">
      <h2>Company Registration</h2>
      <input type="text" name="companyCR" id = "companyCR" required value="" placeholder="Company CR"> <br>
      <input type="text" name="Name" id = "Name" required value=""placeholder="Company Name"> <br>
      <input type="Password" name="Password" id = "Password" required value="" placeholder="Password"> <br>
      <input type="email" name="Email" id = "Email" required value=""placeholder="Company Email"> <br>
      <input type="text" name="Phone" id = "Phone" required value=""placeholder="Company Phone"> <br>
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
      <br>
      <label>Enter the company Logo: </label><br>
      <input type="file" name="Logo">
      </div>
      
      <button name="submit" type="submit" class="Rbtn">Register</button>
    </form>
    </div>
    
    <script src="index.js"></script>
  
  </body>
</html>

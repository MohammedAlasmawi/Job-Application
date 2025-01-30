<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $q = mysqli_query($conn, "SELECT * FROM Admin WHERE id = $id");
  $row = mysqli_fetch_assoc($q);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>



<h1>test</h1>

<?php print("Aloha") ;?>
<h1>Welcome <?php echo $row["Name"]; ?></h1>
</html>
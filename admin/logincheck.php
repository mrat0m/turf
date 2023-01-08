<?php include_once("include/db.php");?>
<?php
error_reporting(0);
session_start();
    $user = $_SESSION["pesphno"];
    $pass = $_SESSION["pespass"];
    $sql = "SELECT * FROM pass WHERE phone='$user' AND pass='$pass'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      $sql_log = $conn->query("SELECT * FROM user WHERE phone='$user' and type='admin'");
      if($sql_log->num_rows > 0)
      {
        $user_data=mysqli_fetch_assoc($sql_log);
        $username=$user_data['name'];
      }
      else {
       header('location:../login.php');
      }
    }
    else {
     header('location:../login.php');
    }

 ?>

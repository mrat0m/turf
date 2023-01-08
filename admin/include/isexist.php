<?php
  include_once("db.php");
  session_start();

  if(isset($_POST['phone'])){
    $user_info=mysqli_query($conn,"SELECT * from user where phone='$_POST[phone]'");
    if($user_info->num_rows>0){
      echo "true";
    }else{
      echo"false";
    }
  }

 ?>

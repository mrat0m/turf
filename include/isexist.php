<?php
  include_once("db.php");
  session_start();

  if(isset($_POST['phone'])){
    $user_info=mysqli_query($conn,"SELECT * from user where phone='$_POST[phone]' and status='verified'");

    if($user_info->num_rows>0){
      $json['isexist'] = true;
    }else{
      $json['isexist'] = false;
    }

    echo json_encode($json);
  }

 ?>

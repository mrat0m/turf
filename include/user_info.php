<?php
  include_once("db.php");
  session_start();

  if(isset($_POST['phone'])){
    $user_info=mysqli_query($conn,"SELECT * from user where phone='$_POST[phone]'");
    $row = mysqli_fetch_assoc($user_info);
    $json['id'] = $row['id'];
    $json['name'] = $row['name'];
    $json['phone'] = $row['phone'];
    $json['status'] = $row['status'];
    $json['type'] = $row['type'];
    echo json_encode($json);
  }

 ?>

<?php
  include_once("db.php");
  session_start();

  if(isset($_POST['pescode'])){
    $user_info=mysqli_query($conn,"SELECT * from booking where phone='$_POST[pescode]'");
    $row = mysqli_fetch_assoc($user_info);
    $json['id'] = $row['id'];
    $json['uid'] = $row['udi'];
    $json['time_id'] = $row['time_id'];
    $json['date'] = $row['date'];
    $json['status'] = $row['status'];
    $json['rate'] = $row['rate'];
    $json['paid'] = $row['paid'];
    $json['off'] = $row['off'];
    $json['time'] = $row['time'];
    echo json_encode($json);
  }

 ?>

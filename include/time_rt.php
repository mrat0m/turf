<?php
  include_once("db.php");
  include_once("../logincheck.php");

  if(isset($_POST['time_id'])){
    $times=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from times  where id= '$_POST[time_id]'"));
    $json['rate']=$times['rate'];
    $json['off']=$times['off'];
    echo json_encode($json);
  }

 ?>

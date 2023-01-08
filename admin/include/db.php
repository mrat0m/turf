<?php
$date1 = new DateTime(null, new DateTimezone("Asia/Kolkata"));
$date = $date1->format('d/m/y');
$time = $date1->format('H:i a');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pecoqykt_pesfields";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 ?>

 <?php

   function dateplus($dat,$day){

     $original_date = $dat;
     $time_original = strtotime($original_date);
     $time_add      = $time_original + (3600*24*$day);

     $new_date      = date("Y-m-d", $time_add);

     return $new_date;
   }

   function dayname($dat){
     $nameOfDay = date('l', strtotime($dat));
     return $nameOfDay;
   }
function get_safe_value($con,$str)
{
if($str!='')
{
  $str=trim($str);
  return mysqli_real_escape_string($con,$str);
}
}
?>

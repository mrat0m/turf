<?php 
 //session_start(); 
 session_start();
 function generateNumericOTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
  }  
    include('include/db.php');  
    $email = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select phone,type from user where email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        
     $phone=$row['phone'];
        if($count == 1){  
   
    mysqli_query($conn,"UPDATE user set status='verified' where phone='$phone'");
      $pass=generateNumericOTP(6);
      mysqli_query($conn,"DELETE FROM pass where phone='$phone'");
      mysqli_query($conn,"INSERT into pass (phone,pass)values('$phone','$pass')");
     echo $pass,$phone;
      $_SESSION['pesphno'] = $phone;
      $_SESSION['pespass'] = $pass;
    
       if($row['type']=="admin"){
    header("Location:admin/dashboard.php");
}else{
    header("Location:dashboard.php");
}
    }   else{  
           echo '<script>alert("Login failed. Invalid username or password")</script>';
          
        }    

?>  
<?php      
    include('include/db.php');  
    $email = $_POST['user'];  
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];  
    $hna = $_POST['hna']; 
    $street = $_POST['street'];
    $pin = $_POST['pin'];  

      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);
        $name = stripcslashes($name);
        $phone = stripcslashes($phone);  
        $password = stripcslashes($password); 
        $hna = stripcslashes($hna);
        $street = stripcslashes($street);
        $pin = stripcslashes($pin); 
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password); 
        $name = mysqli_real_escape_string($conn, $name); 
        $phone = mysqli_real_escape_string($conn, $phone); 
        $hna = mysqli_real_escape_string($conn, $hna);
        $street = mysqli_real_escape_string($conn, $street); 
        $pin = mysqli_real_escape_string($conn, $pin);
      
        $sql = "select * from user where email = '$email'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($row);  
          
        if($count == 1)
        {  
            echo "User already exist";  
        }  
        else{  
            mysqli_query($conn,"insert into user (name,email,phone,password,hna,street,pin) values('$name','$email','$phone','$password','$hna','$street','$pin')");
            header("Location:login.php");
           
        }     
?>  
<?php
  include("include/db.php");
 $card_na=$_POST['card_na'];
  $card_no=$_POST['card_no'];
 $exp_date=$_POST['exp_date'];


		$card_na = stripcslashes($card_na);
		 $card_no = stripcslashes($card_no);
		 $exp_date = stripcslashes($exp_date);
        $card_na = mysqli_real_escape_string($conn, $card_na); 
        $card_no = mysqli_real_escape_string($conn, $card_no); 
        $exp_date = mysqli_real_escape_string($conn, $exp_date); 


		$sql="insert into card_pay(card_na,card_no,exp_date) values ('$card_na','$card_no','$exp_date')";
            $result = mysqli_query($conn, $sql);

            if($result)
            {
            	 header("Location:payment_success.php");
            }

		

  ?>
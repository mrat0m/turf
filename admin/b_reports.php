<?php
require('include/db.php');
$categories='';
$msg='';
$from='';
$to='';
if(isset($_POST['submit'])){
	$from=get_safe_value($conn,$_POST['from']);
	$to=get_safe_value($conn,$_POST['to']);
	$ds=date("Y-m-d");
	if($to <= $ds){

	if($to=='')
	{
		$to=date("Y-m-d");
		
	}
	$sr="select booking.*,user.* from booking,user where booking.uid=user.id AND booking.date BETWEEN DATE('$from') AND DATE('$to')";
	$res=mysqli_query($conn,$sr);
/*	if(!$res)
	{
		mysqli_error($con);
	}*/

	$check=mysqli_num_rows($res);
	if($check>0){

     header("location:book_report.php?from=$from&to=$to");
 

	
		
	}
	else
	{
		$msg="* No data found";
	}
}
else
	{
		$msg="* INVALID DATE";
	}
	

	}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <?php include_once("include/nav.php"); ?>

    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div><br>
    <div class="container fit-lg bg-white">

      <div class="heading">
       <center> BOOKING REPORT</center>
<div class="content pb-0">
	<h4 class="box-link"><a href="reports.php">Go Back</a> </h4>
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card" style="background: #757F9A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #D7DDE8, #757F9A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #D7DDE8, #757F9A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
                       
                        
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">From</label>
									<input type="date" name="from" placeholder="Enter categories name" class="form-control"  value="<?php echo $categories?>" required>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">To</label>
									<input type="date" name="to" placeholder="Enter categories name" class="form-control"  value="<?php echo $categories?>">
								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>

							   </button><br><br>
                                
							  
							   <div class="field_error"><?php echo $msg?></div>

							</div>
						</form>
						   <a href="book_report.php?all=1"><button id="payment-button" name="all" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Get All</span>
							   </button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
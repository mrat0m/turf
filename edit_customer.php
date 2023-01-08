<?php
include_once("include/nav.php");
include_once("include/db.php");

$name='';
$phone='';
$email='';
$hna='';
$street='';
$pin='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!='')
{
    $id=get_safe_value($con,$_GET['id']);
    $res = mysqli_query($con, "select * from user where id='$id'");
$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
	
        $name=$user_data['name'];
        $phone=$user_data['phone'];
        $email=$user_data['email'];
        $hna=$user_data['hna'];
        $street=$user_data['street'];
        $pin=$user_data['pin'];

	}else{
		header('location:settings.php');
		die();
	}

}
if(isset($_POST['submit']))
{

	$name=get_safe_value($con,$_POST['name']);
	$email=get_safe_value($con,$_POST['email']);
	$phone=get_safe_value($con,$_POST['phone']);
	$hna=get_safe_value($con,$_POST['hna']);
	$street=get_safe_value($con,$_POST['street']);
	$pin=get_safe_value($con,$user_data['pin']);
	$password=get_safe_value($con,$_POST['password']);

	$res=mysqli_query($con,"select * from user where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		
		if(isset($user_data['id']) && $user_data['id']!='')
		{
			$getData=mysqli_fetch_assoc($res);
			if($id== $user_data['id'])
			{

			}
			else
			{
				$msg="customer already exists";
			}
		}else{
			$msg="customer already exists";
		}
	}
	
	

	if($msg=='')

if($msg=='')

	{
		if(isset($_GET['id']) && $_GET['id']!='')
		 {
			$sql="update user set name='$name',phone='$phone',email='$email',hna='$hna',street='$street',pin='$pin',password='$password' where id='$id'";
			mysqli_query($con,$sql);
		}
		else
		{
			$sql="insert into tb_location(name,email,phone,hna,street,pin,password) values ('$name','$email','$phone','$hna','$street','$pin','$password')";
            mysqli_query($con,$sql); 

		}
		header('location:settings.php');

	}
}
?>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Dosis|Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<center>
      <div class="loader" id="loader">
        <img src="img/loader.svg" alt=""></img>
      </div>

        <?php include_once("include/nav.php");?>
<center>
    <div class="container-fluid wide fit-lg">
      <div class="img-banner bg-img">
        <img src="img/banner.png" class="" alt="">
      </div>
      <div class="container box-up  d-flex justify-content-center">
            <div class="box-lg">

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>EDIT CUSTOMER</strong></div>
                        <form method="POST">




                           <div class="form-group"><label for="vat" class=" form-control-label">Name</label>

                           	<input type="text" name="name"  class="form-control" required value="<?php echo $user_data['name']?>"></div>

                           <div class="form-group"><label for="vat" class=" form-control-label">email</label>

                           	<input type="text" name="email"  class="form-control" required value="<?php echo $user_data['email']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">Phone</label>

                           	<input type="text" name="phone"  class="form-control" required value="<?php echo $user_data['phone']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">House name</label>

                           	<input type="text" name="hna"  class="form-control" required value="<?php echo $user_data['hna']?>"></div>

                           	<div class="form-group"><label for="vat" class=" form-control-label">Street</label>

                           	<input type="text" name="street"  class="form-control" required value="<?php echo $user_data['street']?>"></div>

                           <div class="form-group"><label for="street" class=" form-control-label">Pincode</label>

                           	<input type="text" name="pin"  class="form-control" required value="<?php echo $user_data['pin']?>"> </div>

                           	<div class="form-group"><label for="street" class=" form-control-label">Password</label>

                           	<input type="text" name="password"  class="form-control" required value="<?php echo $user_data['password']?>"> </div>
                           
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>


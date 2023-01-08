<?php
include('include/db.php');
						if(isset($_GET['from']) && isset($_GET['to'])){
	$from=get_safe_value($conn,$_GET['from']);
	$to=get_safe_value($conn,$_GET['to']);
}
?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<h4 class="box-link"><a href="b_reports.php">Back</a> </h4><br>
<div class="content pb-0" id='printMe'>
<div class="content pb-0">

	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
					 
					 <center><img src="img/logo.png" width="200" height="90"></center>
			   <h3 class="box-title">Booking Report:</h3>
				   <h3><?php  if(isset($_GET['from']) && isset($_GET['to'])) echo $from ." : ". $to ;
				               if(isset($_GET['all']))echo "Bookings till today (".date('d-m-Y').")";?></h3>
				  
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table id="customers">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Booking Date</th>
							   
							   <th>Customer Name</th>
							   <th>Customer Phone</th>
							   <th>Status</th>
							  
							      <?php if(isset($_GET['all'])){  ?>
							  
							   
							    
							   <?php }?>
							   
							   <?php if(!isset($_GET['all'])){  ?>
							   
							   <?php }?>
							   <!-- <th>Cust_id</th> -->
							  
							</tr>
						 </thead>
						 <tbody>
						<?php 
							
							if(isset($_GET['from']) && isset($_GET['to'])){
								$i=1;$p=0;$tot=0;$totpr=0;
	$from=get_safe_value($conn,$_GET['from']);
	$to=get_safe_value($conn,$_GET['to']);
	if($to=='')
	{
		$to=date("Y-m-d");
	}
		$sr="select booking.*,user.name,phone, times.time from booking,user,times where booking.uid=user.id AND booking.time_id=times.id AND booking.date BETWEEN DATE('$from') AND DATE('$to')";
	$res=mysqli_query($conn,$sr);
	if(!$res)
	{
		echo "fgfdg.".mysqli_error($conn);
	}


		while ($row=mysqli_fetch_assoc($res)){
			$trt=$row['date'];
	;
			$su=$row['name'];
			$sq=$row['phone'];
			$t1=$row['status'];
		    $times=$row['time'];

?>



							<tr>
							   <td class="serial"><?php echo $i?></td>
							  
							   <td><?php echo $row['date']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['phone']?></td>
							   <td><?php echo $row['status']?></td>
							  
							</tr>
							<?php 
							  $i+=1;
						      }} ?>

	<?php 
							
							if(isset($_GET['all'])){
								$i=1;$p=0;$st=0;$totpr=0;

		$sr="select booking.*,user.name,phone, times.* from booking,user,times where booking.uid=user.id AND booking.time_id=times.id AND booking.date <= CURDATE()";
	$res=mysqli_query($conn,$sr);
	if(!$res)
	{
		echo "fgfdg.".mysqli_error($conn);
	}


		while ($row=mysqli_fetch_assoc($res)){
			$trt=$row['date'];
		
		
			$t=$row['rate'];
			$sq=$row['phone'];
			$dat=$row['name'];
			$t1=$row['status'];
			
		
?>          



							<tr>
							   <td class="serial"><?php echo $i?></td>
							 
							   <td><?php echo $row['date']?></td>
							   <td><?php echo $row['name']?></td>
							    <td><?php echo $row['phone']?></td>
							   <td><?php echo $row['status']?></td>
							 
							    	
							</tr>
							<?php 
							  $i+=1;
						      }} ?>
						 </tbody>
					  </table>
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial"></th>
							   
							
							   
							</tr>
						 </thead>
						 <tbody>

							<tr>
							   <td class="serial"></td>
							   
							
							</tr>
						</tbody>
					</table>
						  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial"></th>
							   
							  
							
							   
							   
							</tr>
						 </thead>
						 <tbody>

							<tr>
							   <td class="serial"></td>
							   
							  
							  
							</tr>
						</tbody>
					</table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
            <input type="button" onClick="printDiv('printMe')" value="Print"/>
<script>
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        }

    </script>

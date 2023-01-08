<?php

require('include/db.php');
						if(isset($_GET['from']) && isset($_GET['to'])){
	$from=get_safe_value($conn,$_GET['from']);
	$to=get_safe_value($conn,$_GET['to']);
}
?>
<div class="content pb-0" id='printMe'>
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
 <h4 class="box-link"><a href="f_report.php">Back</a> </h4><br>
<div class="content pb-0" id='printMe'>
<div class="content pb-0">

	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
					 <center><img src="img/logo.png" width="200" height="90"></center>
						
	   <h2 class="box-title">Finance Report:</h2>
				   
				   <h5><?php  if(isset($_GET['from']) && isset($_GET['to'])) echo $from ." : ". $to ;
				               if(isset($_GET['all']))echo "Finance till Today (".date('d-m-Y').")";?></h5>
				   
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table id="customers">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>date</th>
							   <th>Customer Name</th>
							    <th>Customer Phone</th>
							   <th>Amount</th>
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
		$sr="select booking.*,user.* from booking,user where booking.uid=user.id AND booking.date BETWEEN DATE('$from') AND DATE('$to')";
	$res=mysqli_query($conn,$sr);
	if(!$res)
	{
		echo "fgfdg.".mysqli_error($conn);
	}


		while ($row=mysqli_fetch_assoc($res)){
			
			$dat=$row['date'];
			$dwt=$row['name'];
			$dt=$row['phone'];
			$su=$row['rate'];
			$tot+=$su;
			
?>



							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['date']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['phone']?></td>
							   <td><?php echo $row['rate']?></td>
							 
							    
							</tr>
							<?php 
							  $i+=1;
						      }} ?>

	<?php 
							
							if(isset($_GET['all'])){
								$i=1;$p=0;$st=0;$tot=0;

		$sr="select booking.*,user.* from booking,user where booking.uid=user.id AND booking.date <= CURDATE()";
	$res=mysqli_query($conn,$sr);
	if(!$res)
	{
		echo "fgfdg.".mysqli_error($conn);
	}


			while ($row=mysqli_fetch_assoc($res)){
			
			$dat=$row['date'];
			$dwt=$row['name'];
			$dt=$row['phone'];
			$su=$row['rate'];
			$tot+=$su;
			
			
?>          



							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['date']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['phone']?></td>
							   <td><?php echo $row['rate']?></td>
							 
							
							
							
							    	
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
							   <h2><center><?php echo "TOTAL -" ?>

							   
							    <?php if(isset($_GET['all'])){echo number_format($tot)." Rs";}if(isset($_GET['from']) && isset($_GET['to'])){echo number_format($tot)." Rs";}?></center></h2>
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

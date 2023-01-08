<?php
require('include/db.php');


			$sr="select * from user";
		
	$res=mysqli_query($conn,$sr);
	if(!$res)
	{
		echo "fgfdg.".mysqli_error($con);
	}

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Customer Report</h4>
				   <h4 class="box-link"><a href="reports.php">Back</a></h4>
				
				               
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Customer Id</th>							 
							   <th>Name</th>
							   <th>Date</th>
							 
							   <th>Time</th>
							    <th>status</th>
							  				
							
							   
							   
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;$tot=0;$qtr=0;
							while($row=mysqli_fetch_assoc($res)){

                                $cid=$row['id'];
		                        $cname=$row['name'];
	                       
	                            $r3=mysqli_query($conn,"select count(uid) as c from booking where uid='$cid'");
	                            $y=mysqli_fetch_assoc($r3);
	                            $c=$y['c'];
                              

	                            /*$r4=mysqli_query($con,"select *from tbl_order_child where order_id='$oid'");
	                            $y1=mysqli_fetch_assoc($r4);
	                            $vn=$y1['vendor_name'];*/

	                          

								?>
							<tr>
							
							  
                               <td><?php 


                                $r32=mysqli_query($conn,"select *from booking where uid='$cid'");
	                            
	                            

                                 $qt=0;$tamt=0;
                               while($y2=mysqli_fetch_assoc($r32)){

                               	$amt=$y2['rate'];
                               	$tamt+=$amt;
                            
                              
                               }

                              ?></td>
                                <td align="left"><?php echo number_format($tamt)." Rs";?></td>
							   <!--   <td><span class='badge badge-edit'><a href="cust_itm.php?id=<?php echo $cid; ?>">Items</a></span></td> -->
							
							</tr>
							<?php $i+=1; } ?>
						 </tbody>
					  </table>

					  		  </table>
				
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>

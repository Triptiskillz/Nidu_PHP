<?php
require('header.php');
isAdmin();
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail">Booking ID</th>
									<th class="product-name"><span class="nobr">Name</span></th>
									<th class="product-name"><span class="nobr">Phone Number</span></th>
									<th class="product-price"><span class="nobr"> Email</span></th>
									<th class="product-name"><span class="nobr">Booking Date</span></th>
									<th class="product-name"><span class="nobr">Booking Time</span></th>
									<th class="product-price"><span class="nobr"> Address </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-add-to-cart"><a  style="color: red;font-size: 18px;" href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a>
								    <a href="../order_pdf.php?id=<?php echo $row['id']?>">PDF</a>
								   </td>
								 
									<td class="product-name"><?php echo $row['name']?></td>
									<td class="product-name"><?php echo $row['phone']?></td>
									<td class="product-name"><?php echo $row['email']?></td>
									<td class="product-name"><?php echo $row['date']?></td>
									<td class="product-name"><?php echo $row['time']?></td>
									<td class="product-name"><?php echo $row['address']?></td>
									<td class="product-name"><?php echo $row['payment_type']?></td>
									<td class="product-name"><?php echo $row['payment_status']?></td>
									<td class="product-name"><?php echo $row['order_status_str']?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>
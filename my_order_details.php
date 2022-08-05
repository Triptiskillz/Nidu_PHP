<?php 
require('navbar.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($conn,$_GET['id']);
?>
<div>
            <div class="row">
                <div class="leftcolumn">
                <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                   <div>
                   <div class="header1">
                    <a href="#default" class="logo">Booking Details</a><p>  </p>
                   
                    <!-- <div class="header-right">
                         <form class="example">
                              <input type="text" placeholder="Search.." name="search2"/>
                                 <button type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div> -->
                    </div>
                   <table>
                        <tr>
                            <th>Name</th>
                            <th>Profile</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total Price </th>
                           
                        </tr>
                        
                              <?php
									$uid=$_SESSION['user_id'];
									$res=mysqli_query($conn,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
									$total_price=0;
									while($row=mysqli_fetch_assoc($res)){
										$total_price=$total_price+($row['qty']*$row['price']);
										?>
											
												<!-- -->
                                                <td><?php echo $row['name']?></td>
												<td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" style="width:30%;"></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['qty']?></span></td>
												<td class="product-price"><span class="amount"><?php echo $row['price']?></span></td>
												<td class="product-subtotal"><?php echo $row['qty']*$row['price']?></td>
												
											
                                            </tr>
									<?php 
                                        }
                                 ?>
                       
                        </table>
                       
                        

                   </div>
                    </div>
            </div>
        </div>
<?php include "footer.php"?>
<script src="assets/js/cart.js"></script>       
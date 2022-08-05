<?php include "navbar.php";
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>



<div>
            <div class="row">
                <div class="leftcolumn">
                <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                   <div>
                   <div class="header1">
                    <a href="#default" class="logo">Booking</a><p> 5 </p>
                    <div class="header-right">
                         <form class="example">
                              <input type="text" placeholder="Search.." name="search2"/>
                                 <button type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                    </div>
                   <table>
                        <tr>
                            <th>ID</th>
                            <th>Booking Date</th>
                            <th> Address </th>
                            <th>Payment Type </th>
                            <th>Payment Status </th>
                            <th>Booking  Status</th>
                        
                        </tr>
                        
                            <?php
									$uid=$_SESSION['user_id'];
									$res=mysqli_query($conn,"select `order`.*,order_status.name as order_status_str
                                        from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
									while($row=mysqli_fetch_assoc($res)){
									?>
											
												<!-- -->
                                                <td><a  style="color: red;" href="my_order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a>
												<br/>
												<a href="order_pdf.php?id=<?php echo $row['id']?>"> PDF</a>
                                                </td>
                                                <td class="product-name"><?php echo $row['added_on']?></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['address']?></span></td>
												<td class="product-price"><span class="amount"><?php echo $row['payment_type']?></span></td>
												<td class="product-subtotal"><?php echo $row['payment_status']?></td>
												<td class="product-subtotal"><?php echo $row['order_status_str']?></td>
											
                                            </tr>
									<?php 
                                        }
                                 ?>
                       
                        </table>
                       
                        <div class="booking_pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a class="active" href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">6</a>
                            <a href="#">&raquo;</a>
                         </div>

                   </div>
                    </div>
            </div>
        </div>
<?php include "footer.php"?>
<script src="assets/js/cart.js"></script>
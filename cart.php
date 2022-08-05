
<?php include "navbar.php"?>
<div>
            <div class="row">
                <div class="leftcolumn">
                <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                   <div>
                   <div class="header1">
                    <a href="#default" class="logo">Requests</a><p> 5 </p>
                    <div class="header-right">
                         <form class="example">
                              <input type="text" placeholder="Search.." name="search2"/>
                                 <button type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                    </div>
                   <table>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Bill</th>
                            <th>No. of Days</th>
                            <th>Total</th>
                            <th>Remove</th>
                            <th></th>
                        </tr>
                        
                               <?php
                                
                                      if(isset($_SESSION['cart'])){
                                        
											foreach($_SESSION['cart'] as $key=>$val){
											    $productArr=get_product($conn,'','',$key);
                                                $sno=$productArr[0]['id'];
											    $pname=$productArr[0]['name'];
											    // $mrp=$productArr[0]['mrp'];
										    	$price=$productArr[0]['price'];
										    	$image=$productArr[0]['image'];
                                                 $categories =$productArr['0']['categories'];
										    	$qty=$val['qty'];
									?>
											
												<!-- -->
                                                <td><?php echo $sno?></td>
												<td class="product-name"><a href="#"><?php echo $pname?></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $categories?></span></td>
												<td class="product-price"><span class="amount"><?php echo $price?></span></td>
                                                <td class="product-quantity"><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a style="color: #4A2C2A;" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
												</td>
												<td class="product-subtotal"><?php echo $qty*$price?></td>
												
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove');"><i style="color: red;font-size: 24px;"class="bx bx-trash-alt icons"></i></a></td>
											     <td> <div class="cart_checkout">
                                                         <a href="<?php echo SITE_PATH?>booking.php"><button class='btn1_sidebar '>Bookings</button></a>           
                                                  </div></td>
                                            </tr>
									<?php 
                                        }
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
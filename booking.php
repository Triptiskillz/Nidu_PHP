<?php include "navbar.php";


$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($conn,$_POST['address']);
	$name=get_safe_value($conn,$_POST['name']);
	$email=get_safe_value($conn,$_POST['email']);
  $phone=get_safe_value($conn,$_POST['phone']);
  $date=get_safe_value($conn,$_POST['date']);
  $time=get_safe_value($conn,$_POST['time']);
  $sevice=get_safe_value($conn,$_POST['sevice']);
	$payment_type=get_safe_value($conn,$_POST['payment_type']);

  $user_id=$_SESSION['user_id'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($conn,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$price*$qty;
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1'; 
	$added_on=date('Y-m-d h:i:s');
	
	
	mysqli_query($conn,"insert into `order`(user_id,address,name,email,phone,date,time,sevice,payment_type,payment_status,order_status,added_on,total_price) 
  values('$user_id','$address','$name','$email','$phone','$date','$time','$sevice','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
	
	$order_id=mysqli_insert_id($conn);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($conn,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($conn,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	unset($_SESSION['cart'])
	?>
	<script>
		window.location.href='thank_you.php';
	</script>
	<?php
}
?>
<div class="accordion__title">
<?php 
	$accordion_class='accordion__title';
	 if(isset($_SESSION['USER_LOGIN'])){
		$accordion_class='row';
	?>
        <div class="row">
           <div class="leftcolumn">
               <div class="booking_sidebar">
                 <div class='booking_margin'>
                      <?php
                            $cart_total=0;
                            foreach($_SESSION['cart'] as $key=>$val){
                            $productArr=get_product($conn,'','',$key);
                            $pname=$productArr[0]['name'];
                            // $mrp=$productArr[0]['mrp'];
                            $price=$productArr[0]['price'];
                            // $image=$productArr[0]['image'];
                            $categories =$productArr['0']['categories'];
                            $qty=$val['qty'];
                            
                            ?>
                                <h3><?php echo $pname?></h3><br/>
                                <p><a href="#">Categories :</a> <span class="price"><?php echo $categories?></span></p>
                                <p><a href="#">Price :</a> <span class="price"><?php echo $price?></span></p>
                                <p><a href="#">QTY :</a> <span class="price"><?php echo $qty?></span></p>
                              
                               <hr>
                    
                                <?php } ?>
                              <p>Total <span class="price" style="color:black"><b><?php echo $price*$qty?></b></span></p>
                  </div>
                </div>
             </div>
              <div class="rightcolumn">
                    <div class="container_Appointment">
                    <form method="post">
                          <p>Booking</p>
                              <div class="login">
                                <input type="text" placeholder="Your Name" name="name" class="input"/>
                                <input type="text" placeholder="Your Email Address" name="email" class="input"/>
                              </div>
                            
                              <div class="login">
                                <input type="text" placeholder="Phone Number"  name="phone" class="input"/>
                                <input type="date"  class="input" name="date"/>
                              </div>
                              <div class="login">
                                <input type="time" placeholder="Time" name="time" class="input"/>
                                <input type="text" placeholder="Type of sevice" name="sevice" class="input"/>
                              </div>
                              
                            <div class="subject">
                                <input type="text" placeholder="Address"  name="address" name="submit" class="input"/>
                            </div>

                            <div class="col-50">
                                 
                                 <input type="radio" name="payment_type" value="COD" required/> Payment Method (COD)
	                                  	&nbsp;
                              </div>
                              <br>
                          <div > <button name="submit" class="btn_Appointment">Submit</button></div>
                       </form>     
                    </div>
               </div>
          </div>
   </div>
									<?php }else{?>
	     <center style="margin: 20% 0 25% 0;">
             <h1>Please Login or Signup..</h1><br/>
             <a  href="signup.php" class="thank_button">login</a>
         </center>
<?php	}?>
<?php include "footer.php"?>

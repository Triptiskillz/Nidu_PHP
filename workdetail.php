<?php include "navbar.php"?>
<?php
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($conn,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($conn,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='home.php';
		</script>
		<?php
	}
	
	$resMultipleImages=mysqli_query($conn,"select product_images from product_images where product_id='$product_id'");
	$multipleImages=[];
	if(mysqli_num_rows($resMultipleImages)>0){
		while($rowMultipleImages=mysqli_fetch_assoc($resMultipleImages)){
			$multipleImages[]=$rowMultipleImages['product_images'];
		}
	}
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}



if(isset($_POST['review_submit'])){
	$rating=get_safe_value($conn,$_POST['rating']);
	$review=get_safe_value($conn,$_POST['review']);
	
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($conn,"insert into product_review(product_id,user_id,rating,review,status,added_on) values('$product_id','".$_SESSION['user_id']."','$rating','$review','1','$added_on')");
	header('location:workdetail.php?id='.$product_id);
	die();
}


$product_review_res=mysqli_query($conn,"select users.username,product_review.id,product_review.rating,product_review.review,product_review.added_on from users,product_review where product_review.status=1 and product_review.user_id=users.id and product_review.product_id='$product_id' order by product_review.added_on desc");

?>
<div>
            <div class="row">
                <div class="leftcolumn">
                <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                     <div class="wrapper1">
                        <div class="profile-card_workdetail js-profile-card">
                             <div class="profile-card__img">
                             <?php if(isset($multipleImages[0])){
							                    				foreach($multipleImages as $list){
                                            echo "<img src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."' onclick=showMultipleImage('".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list."')>";
                                     		}
									                		
								                	 } ?>
                                  </div>
                                 
			                              
                                  
                                     <div class="profile-card__cnt1 js-profile-cnt">
                                        <div class="profile-card__name1"><?php echo $get_product['0']['name']?></div>
                                            <div class="profile-card__txt1"><?php echo $get_product['0']['short_desc']?></div>
                                                  <div class="col-container1">
                                                        <div class="col1">
                                                            <p><b>Phone No. </b><?php echo $get_product['0']['phone']?></p>
                                                             <p><b>Aadhar Card No. </b><?php echo $get_product['0']['aadharcard']?></p>
                                                             <p><b>Address: </b><?php echo $get_product['0']['address']?></p>
                                                        </div>
                                                        <div class="col1">
                                                                <p><b>Email: </b><?php echo $get_product['0']['email']?></p>
                                                                <p><b>Work Type: </b><?php echo $get_product['0']['categories']?></p>
                                                                <div class="sin__desc">
                                                                   <p><span>No. of date:</span> 
								                                		<select id="qty">
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                            <option>6</option>
                                                                            <option>7</option>
                                                                            <option>8</option>
                                                                            <option>9</option>
                                                                            <option>10</option>
                                                                        </select>
                                                                        </p>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                    <div class='workdetail_Discribation'>
                                                        <div class="_tab">
                                                            <button class="tablinks" onclick="openCity(event, 'Discribation')">Discribation</button>
                                                            <button class="tablinks" onclick="openCity(event, 'Review')">Review</button>
                                        
                                                          </div>

                                                          <div id="Discribation" class="tabcontent">
                                                            
                                                             <p><?php echo $get_product['0']['description']?></p>
                                                           </div>

                                                          <div id="Review" class="tabcontent">
                                                          <?php 
							                            		if(mysqli_num_rows($product_review_res)>0){
									                                
							                                		while($product_review_row=mysqli_fetch_assoc($product_review_res)){
							                                		?>
									
							                            		<!-- <article class="row"> -->
							                            			<div class="col-md-12 col-sm-12">
								                                		  <div class="panel panel-default arrow left">
								                                			<div class="panel-body">
								                                    			  <div class="text-left">
                                                                                        <p class="comment-rating"><?php echo $product_review_row['username']?> (<?php echo $product_review_row['rating']?>)</p>
								                                        			    	<time class="comment-date">
                                                                                               <?php
                                                                                                    $added_on=strtotime($product_review_row['added_on']);
                                                                                                        echo date('d M Y',$added_on);
                                                                                                    ?>
			
							                                            				 	</time>
							                                        				  </div>
										                                	  <div class="comment-post">
											                                        	<p>
											                                            	  <?php echo $product_review_row['review']?>
											                                            	</p>
											                                      </div>
											                                    </div>
										                                  </div>
									                                	</div>
									                                <!-- </article> -->
                                                                    <div class="line"></div>
								                            	<?php } 
                                                                        }else { 
									                                	echo "<h3 class='submit_review_hint'>No review added</h3><br/>";
									                                   }
									                             ?>
                                                                 <br/>
                                                          <h4 class="review_heading">Enter your review</h4><br/>
                                                    <?php
                                                            if(isset($_SESSION['USER_LOGIN'])){
                                                            ?>
                                                            <div class="row" id="post-review-box" style=>
                                                                 <div class="col-md-12">
                                                                    <form action="" method="post">
                                                                       <select  class="input_workdetail" name="rating" required>
                                                                            <option value="">Select Rating</option>
                                                                            <option>Worst</option>
                                                                            <option>Bad</option>
                                                                            <option>Good</option>
                                                                            <option>Very Good</option>
                                                                            <option>Fantastic</option>
                                                                       </select>	<br/>
                                                                    <textarea    class="input_workdetail" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5"></textarea>
                                                                    <div class="text-right mt10">
                                                                        <button class="btn1_sidebar" type="submit" name="review_submit">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                            <?php } else {
                                                                echo "<span class='submit_review_hint'>Please <a href='login.php'>login</a> to submit your review</span>";
                                                            }
                                                            ?>
                                                          </div>
                                                    </div>
                                                    <div class='workdetail_icon'>
                                                          <ul>
                                                              <a href="https://facebook.com/share.php?u=<?php echo $meta_url?>"><li><i class="fa fa-facebook"></i></li></a>
                                                              <a href="https://api.whatsapp.com/send?text=<?php echo $get_product['0']['name']?> <?php echo $meta_url?>"><li><i class="fa fa-whatsapp"></i></li></a>
                                                              <a href="https://twitter.com/share?text=<?php echo $get_product['0']['name']?>&url=<?php echo $meta_url?>"><li><i class="fa fa-twitter"></i></li></a>
                                                              <!--  <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                                              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                              <li><a href="#"><i class="fab fa-twitter"></i></a></li>  -->
                                                          </ul>
                                                      </div>
                                                        <div class="btn11">
                                                            <a>Contact |</a>  
                                                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Request Booking</a>   
                                                         </div>
                                               </div>
                                        
                                        
                                 </div>
                                
                             </div>
                             
                    </div>
              </div>  <script src="assets/js/cart.js"></script>
        </div>

        
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <?php include "footer.php"?>
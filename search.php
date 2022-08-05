<?php include "navbar.php"?>
<?php 
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
$str=mysqli_real_escape_string($conn,$_GET['str']);
if($str!=''){
	$get_product=get_product($conn,'','','',$str);
}else{
	?>
	<script>
	window.location.href='home.php';
	</script>
	<?php
}										
?>
<?php if(count($get_product)>0){?>
<link rel="stylesheet" href="assets/css/home.css">
<div>
  <div class="row">
      <div class="leftcolumn">
           <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                 <?php
						foreach($get_product as $list){
					?>
                            <!-- Start Single Category -->
                            <div class="home_row">
                    <div class="home_column">
                        <div class="home_card">
                           <div class="row">
                               <div class="leftcolumn_card">
                                 <p><?php echo $list['categories']?></p>
                               </div>
                               <div class="rightcolumn_card">
                                  <i class="fa fa-university" aria-hidden="true"></i>
                                  <p>Build</p>
                               </div>
                            </div>
                            <div class='home_card_img'>
                                  <img src="media/product/<?php echo $list['image']?>"/>
                                  <div class="home_card_overlay">
                                     <div class="home_card_icon-bar1">
                                     <a href="#" class='home_card_fa-contact'>4.2</a> 
                                       <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                       
                                       <a href="#"><i class="fa fa-check-circle" aria-hidden="true"></i></a> 
                                    </div>
                                  </div>
                            </div>
                              <div class='home_card_avatar'>
                                   <img class='home_avatar' src='https://cdn.onlinewebfonts.com/svg/img_454260.png' />
                                    <p><?php echo $list['name']?><br/><span><i class='bx bxs-map-pin'></i>
                                     <?php echo $list['address']?></span></p>
                              </div>
                              <div class='line'></div>
                                     <p class='home_card_tittle'>Starting at <b><?php echo $list['price']?></b>/day</p>
                                  <div class="home_card_icon-bar">
                                    <a href="workdetail.php?id=<?php echo $list['id']?>">Detail</a>
                                    <!-- <a href="#">Contact</a> 
                                    <a href="booking.php">Book</a>  -->
                                  </div>
                         </div>
                    </div>
                </div>
                      <!-- End Single Category -->
					<?php } ?>
            </div>
        </div>
    </div>    
    <?php } else { 
				echo "Data not found";
			} ?>
  <?php include "footer.php"?>

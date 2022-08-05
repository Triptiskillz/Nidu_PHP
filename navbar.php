<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/home.css">
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="assets/css/profile.css">
<link rel="stylesheet" href="assets/css/sidebar.css">
<link rel="stylesheet" href="assets/css/workdetail.css">
<link rel="stylesheet" href="assets/css/booking.css">
<link rel="stylesheet" href="assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php 
require 'config.php';
require('functions.inc.php');
require('add_to_cart.inc.php');
// echo $_SESSION['cart'];
$cat_res=mysqli_query($conn,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
// echo $totalProduct ;

// if (isset($_SESSION['USER_LOGIN'])) {
//     header("Location: home.php");
// }

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Nidu";
$meta_desc="Nidu";
$meta_keyword="Nidu";
$meta_url=SITE_PATH;
$meta_image="";
if($mypage=='workdetail.php'){
	$product_id=get_safe_value($conn,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($conn,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
    $meta_url=SITE_PATH."workdetail.php?id=".$product_id;
	$meta_image=PRODUCT_IMAGE_SITE_PATH.$product_meta['image'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}
?> 
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- socail media share -->
    <meta property="og:title" content="<?php echo $meta_title?>"/>
	<meta property="og:image" content="<?php echo $meta_image?>"/>
	<meta property="og:url" content="<?php echo $meta_url?>"/>
	<meta property="og:site_name" content="<?php echo SITE_PATH?>"/>
 
</head>

<header class="header">
    <div>
        <div class="row_navbar align-items-center justify-content-between">
            <div class="logo">
               <a href="home.php">
                
                     <span>N</span>idu
                   
               </a>
            </div>
            <button type="button" class="nav-toggler">
               <span></span>
            </button>
            <nav class="nav">
            <!-- <li><a href="http://localhost/chat/">Messages</a></li> -->
               <ul>
               <?php if(isset($_SESSION['USER_LOGIN'])){
											echo '
                                 <li><a href="my_order.php">Bookings</a></li>
                                 <li> <a  href="cart.php" class="htc__qua" id="notification">
                                          <span>Requests</span>
                                              <span class="badge"><?php echo $totalProduct ?></span>
                                          </a>
                                 </li>
                                 
                                
                                 <li><a class="btn1"href="Profile.php">Profile</a></li>
                                 <li><a class="btn" href="admin/login.php">Switch</a></li>
                                 <li><a href="logout.php" ><i style="font-size: 28px;" class="bx bx-log-out-circle"></i></a></li>'; 
										}else{
											echo  ' <li><a class="btn" href="admin/login.php">Switch</a></li>
                                                  <li><a class="btn" href="signup.php">Sign IN</a></li>
                                 ';
										}
										?>                  
                  <!-- <li><a  class="btn1"  href="signup.php">Sign UP</a></li> -->
               </ul>
            </nav>
        </div>
    </div>
 </header>

 <script >  
     const navToggler = document.querySelector(".nav-toggler");
 navToggler.addEventListener("click", navToggle);

 function navToggle() {
    navToggler.classList.toggle("active");
    const nav = document.querySelector(".nav");
    nav.classList.toggle("open");
    if(nav.classList.contains("open")){
    	nav.style.maxHeight = nav.scrollHeight + "px";
    }
    else{
    	nav.removeAttribute("style");
    }
 } 
    </script>
         <script src="assets/js/cart.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
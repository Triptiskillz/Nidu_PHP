<?php
include('../vendor/autoload.php');
require 'connection.php';
require('functions.inc.php');

if(!$_SESSION['ADMIN_LOGIN']){
	die();
	// if(!isset($_SESSION['user_id'])){
	// 	die();
	// }
}

$order_id=get_safe_value($con,$_GET['id']);

$css=file_get_contents('css/bootstrap.min.css');
$css.=file_get_contents('style.css');

$html='<div class="wishlist-table table-responsive">
<h3>Booking Details</h3>
   <table>
      <thead>
         <tr>
            <th class="product-thumbnail">Worker Name</th>
            <th class="product-thumbnail">Profile Image</th>
            <th class="product-name">Days</th>
            <th class="product-price">Price</th>
			<th class="product-price">Phone Number</th>
            <th class="product-price">Total Price</th>
         </tr>
      </thead>
      <tbody>';
		
		if(isset($_SESSION['ADMIN_LOGIN'])){
			$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
		}
		
		// else{
			
		// }
		// $uid=$_SESSION['user_id'];
		// 	$res=mysqli_query($conn,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
	
	
		$total_price=0;
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
		$total_price=$total_price+($row['qty']*$row['price']);
		 $pp=$row['qty']*$row['price'];
         $html.='<tr>
            <td class="product-name">'.$row['name'].'</td>
            <td class="product-name"> <img src="'.PRODUCT_IMAGE_SITE_PATH.$row['image'].'" width:30%></td>
            <td class="product-name">'.$row['qty'].'</td>
            <td class="product-name">'.$row['price'].'</td>
			<td class="product-name">'.$row['mobile'].'</td>
            <td class="product-name">'.$pp.'</td>
         </tr>';
		 }
		 $html.='<tr>
				<td colspan="3"></td>
				<td class="product-name">Total Price</td>
				<td class="product-name">'.$total_price.'</td>
				
			</tr>';
		 
      $html.='</tbody>
   </table>
</div>';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>

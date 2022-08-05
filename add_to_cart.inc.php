<?php
class add_to_cart{
	function addProduct($pid,$qty){
		$_SESSION['cart'][$pid]['qty']=$qty;
		
	}
	
	function updateProduct($pid,$qty){
		if(isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid]['qty']=$qty;
		}
	}
	
	function removeProduct($pid){
		if(isset($_SESSION['cart'][$pid])){
			unset($_SESSION['cart'][$pid]);
		}
	}
	
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	
	function totalProduct(){
		// $session_ids = $_SESSION['cart'];
		// echo $session_ids;
		if(isset($_SESSION['cart'])){
			// echo count($_SESSION['cart']);
			
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
		
	}

}
?>
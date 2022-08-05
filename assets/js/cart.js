// function manage_cart(pid,type){
// 	if(type=='update'){
// 		var qty=jQuery("#"+pid+"qty").val();
// 	}else{
// 		var qty=jQuery("#qty").val();
// 	}
// 	jQuery.ajax({
// 		url:'manage_cart.php',
// 		type:'post',
// 		data:'pid='+pid+'&qty='+qty+'&type='+type,
// 		success:function(result){
// 			if(type=='update' || type=='remove'){
// 				window.location.href='cart.php';
// 			}
// 			jQuery('.htc__qua').html(result);
// 		}	
// 	});	
// }
function manage_cart(pid,type,is_checkout){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			result=result.trim();
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			if(result=='not_avaliable'){
				alert('Qty not avaliable');	
			}else{
				jQuery('.htc__qua').html(result);
				if(is_checkout=='yes'){
					window.location.href='booking.php';
				}
			}
		}	
	});	
}
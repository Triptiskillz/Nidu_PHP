<?php
require 'config.php';
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$username=get_safe_value($conn,$_POST['username']);
$email=get_safe_value($conn,$_POST['email']);
$aadharcard=get_safe_value($conn,$_POST['aadharcard']);
$mobile=get_safe_value($conn,$_POST['mobile']);
$professional=get_safe_value($conn,$_POST['professional']);
$address = get_safe_value($conn,$_POST['address']);
$uid=$_SESSION['user_id'];
mysqli_query($conn,"update users set username='$username',email='$email',aadharcard='$aadharcard', mobile='$mobile', professional='$professional', address='$address' where id='$uid'");
$_SESSION['USER_NAME']=$username;
$_SESSION['USER_EMAIL']=$email;
$_SESSION['USER_AADHARCARD']=$aadharcard;
$_SESSION['USER_MOBILE']=$mobile;
$_SESSION['USER_PROFESSIONAL']=$professional;
$_SESSION['USER_ADDRESS']=$address;
echo "Your updated";
?>
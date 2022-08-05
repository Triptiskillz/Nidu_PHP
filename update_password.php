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
$current_password=get_safe_value($conn,$_POST['current_password']);
$new_password=get_safe_value($conn,$_POST['new_password']);
$uid=$_SESSION['user_id'];
$new_passwords=md5($new_password);
$row=mysqli_fetch_assoc(mysqli_query($conn,"select password from users where id='$uid'"));

if($row['password']!=md5($current_password)){
	echo "Please enter your current valid password";
}else{
	mysqli_query($conn,"update users set password='$new_passwords' where id='$uid'");
	echo "Password updated";
}
?>
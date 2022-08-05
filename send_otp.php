<?php
require 'config.php';
require('functions.inc.php');


$type=get_safe_value($conn,$_POST['type']);
if($type=='email'){
	$email=get_safe_value($conn,$_POST['email']);
	$check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
	if($check_user>0){
		echo "email_present";
		die();
	}
	
	$otp=rand(1111,9999);
	$_SESSION['EMAIL_OTP']=$otp;
	$html="$otp is your OTP";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="sharmatripti526@gmail.com";
	$mail->Password="09072000";
	$mail->SetFrom("sharmatripti526@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="New OTP";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		//echo "Error occur";
	}
}

if($type=='mobile'){
	$mobile=get_safe_value($conn,$_POST['mobile']);
	$check_mobile=mysqli_num_rows(mysqli_query($conn,"select * from users where mobile='$mobile'"));
	if($check_mobile>0){
		echo "mobile_present";
		die();
	}
	$otp=rand(1111,9999);
	$_SESSION['MOBILE_OTP']=$otp;
	$message="$otp is your otp";

	// require('php-in/textlocal.class.php');

	// $username = "sharmatripti526@gmail.com";
	// $hash = "c7d47bbdedadc5754a392457fd3c202f584fc7953f78fb4a395745ca63b5e545";
    
     

	$mobile=$mobile;
	// $apiKey = urlencode('NTYzNDQ1NDUzOTcwNTM2YjcwNGY1NjcxNDc1Njc5NjM=');
	// $numbers = array($mobile);
	// $sender = urlencode('TXTLCL');
	// $message = rawurlencode($message);
	// $numbers = implode(',', $numbers);
 	// $data = array('username'=> $username, 'hash'=> $hash, 'apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 	// $ch = curl_init('https://api.textlocal.in/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);
	// echo "done";


	$fields = array(
		"sender_id" => "TXTIND",
		"message" => $message,
		"route" => "v3",
		"numbers" => $mobile,
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($fields),
	  CURLOPT_HTTPHEADER => array(
		"authorization: gSqGOJnXtYzDkdIjerpN1lMQ40m3VcKP56FfUHxawZi27WoTRE07pTAyaieXn8wgSKMu4hzC6LEQRdI1",
		"accept: */*",
		"cache-control: no-cache",
		"content-type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  //echo "cURL Error #:" . $err;
	} else {
	  echo "done";
	}
	//echo "done";

}
?>
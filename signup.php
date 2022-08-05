<?php 
// echo '<pre>';
// session_start();
// print_r($_SESSION);
// die();
require 'config.php';
// require('functions.inc.php');
error_reporting(0);
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='my_order.php';
	</script>
	<?php
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
    $aadharcard = $_POST['aadharcard'];
    $mobile= $_POST['mobile'];
    $professional = $_POST['professional'];
    $address = $_POST['address'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

    $token=bin2hex(random_bytes(15));

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, token, aadharcard, mobile, professional, address)
					VALUES ('$username', '$email', '$password', '$token', '$aadharcard', '$mobile', '$professional', '$address')";
			//  echo "INSERT INTO users (username, email, password, token, aadharcard, mobile, professional, address)
            //  VALUES ('$username', '$email', '$password', '$token', '$aadharcard', '$mobile', '$professional, '$address)";
            $result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
        $_SESSION['USER_LOGIN']='yes';
		$_SESSION["user_id"] = $row['id'];
        $_SESSION['USER_NAME']=$row['username'];
        $_SESSION['USER_EMAIL']=$row['email'];
        $_SESSION['USER_AADHARCARD']=$row['aadharcard'];
        $_SESSION['USER_MOBILE']=$row['mobile'];
        $_SESSION['USER_PROFESSIONAL']=$row['professional'];
        $_SESSION['USER_ADDRESS']=$row['address'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/signup.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Nidu</title>
    </head>
    <?php include "navbar.php"?>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/images/login.svg" alt="">
                </div>

                <div class="login__forms">
                    <!-- login part -->
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Sign In</h1>
    
                        <div class="login__box1">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" class="login__input" name="email" value="<?php echo $email; ?>" required>
                        </div>
    
                        <div class="login__box1">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" class="login__input" name="password" value="<?php echo $_POST['password']; ?>" required>
                        </div>

                        <a href="forgotpassword.php" class="login__forgot" id="forget-password">Forgot password?</a>

                        <button name="login" class="login__button" >Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>
                     
                    <!-- signup part -->
                     
                    <form action="" class="login__create none" id="login-up" method="POST">
                        <h1 class="login__title">Create Account</h1>
    

                        <div class="row_signup">
                            <div class="column_signup">
                              <div class="login__box1">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" class="login__input">
                                 
                               </div>
                            </div>
                            <div class="column_signup">
                              <div class="login__box1">
                              <i class='bx bxs-file login__icon'></i>
                                  <input type="text" placeholder="Aadhar Card No."  name="aadharcard"  value="<?php echo $aadharcard; ?>" class="login__input">
                            
                               </div>
                            </div>
                         </div>

                         <div class="login__box1">
                            <i class='bx bx-at login__icon'></i>               
                           <input type="text" placeholder="Email"  name="email"   id="email"  value="<?php echo $email; ?>" class="login__input">
                       </div>

             <!-- email otp -->
        <!-- <div class="row_sign ">
              <div class="column_sign ">
                   <div class="card_sign ">
                      <div class="login__box1">
                            <i class='bx bx-at login__icon'></i>               
                           <input type="text" placeholder="Email"  name="email"   id="email"  value="<?php echo $email; ?>" class="login__input">
                       </div>
                 </div>
             </div>

             <div class="column_sign ">
                  <div class="card_sign ">
                        <div class="login__box1 email_verify_otp " style="display: none">
                              <i class='bx bx-at login__icon ' ></i>
                                  <input type="text" id="email_otp" placeholder="OTP"   class=" login__input">
                           </div>
                    </div>
             </div>
              
              <div class="column_sign ">
                 <div class="card_sign ">
                       <div class="">
                              <button type="button" class="fv-btn email_sent_otp height_60px login__button"  onclick="email_sent_otp()">Send OTP</button>                
                              <button type="button" class="fv-btn email_verify_otp height_60px login__button" style="display: none" onclick="email_verify_otp()">Verify OTP</button>
                              <span id="email_otp_result"></span>
                      </div>
                  </div>
                  <span class="field_error" id="email_error"></span>
          </div>

          <div class="login__box1">
                            <i class='bx bxs-graduation login__icon'></i>
                            <input type="text" placeholder="Professional"  name="professional"  value="<?php echo $professional; ?>" class="login__input">
            </div> -->
            <div class="login__box1">
                            <i class='bx bxs-graduation login__icon'></i>
                            <input type="text" placeholder="Professional"  name="professional"  value="<?php echo $professional; ?>" class="login__input">
            </div>

            <div class="login__box1">
                         <i class='bx bx-phone login__icon'></i>
                           <input type="text" placeholder="mobile" id="mobile"  name="mobile"  value="<?php echo $mobile; ?>" class="login__input">
                       </div>
          <!-- mobile number otp -->
          <!-- <div class="row_sign ">
              <div class="column_sign ">
                   <div class="card_sign ">
                      <div class="login__box1">
                         <i class='bx bx-phone login__icon'></i>
                           <input type="text" placeholder="mobile" id="mobile"  name="mobile"  value="<?php echo $mobile; ?>" class="login__input">
                       </div>
                 </div>
             </div>

             <div class="column_sign ">
                  <div class="card_sign ">
                        <div class="login__box1 mobile_verify_otp " style="display: none">
                              <i class='bx bx-at login__icon ' ></i>
                              <input type="text" id="mobile_otp" placeholder="OTP"  class=" login__input">
                           </div>
                    </div>
             </div>
              
              <div class="column_sign ">
                 <div class="card_sign ">
                       <div class="one_place_signup">
                               <button type="button" class="fv-btn mobile_sent_otp height_60px login__button" onclick="mobile_sent_otp()">Send OTP</button>
                                             
                               <button type="button" class="fv-btn mobile_verify_otp height_60px login__button" style="display: none" onclick="mobile_verify_otp()">Verify OTP</button>
                              <span id="mobile_otp_result"></span>
                      </div>
                  </div>
                  <span class="field_error" id="mobile_error"></span>
          </div> -->
         

                         <!-- <div class="row_signup">
                            <div class="column_signup">
                              
                                </div>
                            
                            <div class="column_signup">
                              <div class="one_place_signup">
                              <button type="button" class="fv-btn email_sent_otp height_60px login__button"  onclick="email_sent_otp()">Send OTP</button>
                            
                              <button type="button" class="fv-btn email_verify_otp height_60px login__button" style="display: none" onclick="email_verify_otp()">Verify OTP</button>
                              <span id="email_otp_result"></span>
                            </div>
                            
                         </div> -->

                       
                         
                        <div class="login__box1">
                            <i class='bx bxs-map-pin login__icon'></i>
                            <input type="text" placeholder="Address"  name="address"  value="<?php echo $address; ?>" class="login__input">
                        </div>

                        <div class="row_signup">
                            <div class="column_signup">
                                 <div class="login__box1">
                                     <i class='bx bx-lock-alt login__icon'></i>
                                     <input type="password" placeholder="Password" name="password" class="login__input" value="<?php echo $_POST['password']; ?>" >
                                  </div>
                            </div>
                            <div class="column_signup">
                                 <div class="login__box1">
                                     <i class='bx bx-lock-alt login__icon'></i>
                                     <input type="password" placeholder="Confirm Password" name="cpassword" class="login__input" value="<?php echo $_POST['cpassword']; ?>" >
                                  </div>
                            </div>
                         </div>
                       
                        <button name="submit" class="login__button" >Sign Up</button>
                        <!-- disabled id="btn_register" -->
                        <!-- <a href="#"   ></a> -->

                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <span class="login__signup"  id="sign-in"> Sign In</span>
                        </div>
                      
                        <!-- <div class="login__social">
                            <a href="#" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                            <a href="#" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                            <a href="#" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <!-- <input type="textbox" id="is_email_verified"/>
		<input type="textbox" id="is_mobile_verified"/> -->
        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
        <script>
		function email_sent_otp(){
           
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							if(jQuery('#is_mobile_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
		
		function mobile_sent_otp(){
			jQuery('#mobile_error').html('');
			var mobile=jQuery('#mobile').val();
			if(mobile==''){
				jQuery('#mobile_error').html('Please enter mobile number');
			}else{
				jQuery('.mobile_sent_otp').html('Please wait..');
				jQuery('.mobile_sent_otp').attr('disabled',true);
				jQuery('.mobile_sent_otp');
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'mobile='+mobile+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('#mobile').attr('disabled',true);
							jQuery('.mobile_verify_otp').show();
							jQuery('.mobile_sent_otp').hide();
						}else if(result=='mobile_present'){
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Mobile number already exists');
						}else{
							jQuery('.mobile_sent_otp').html('Send OTP');
							jQuery('.mobile_sent_otp').attr('disabled',false);
							jQuery('#mobile_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function mobile_verify_otp(){
			jQuery('#mobile_error').html('');
			var mobile_otp=jQuery('#mobile_otp').val();
			if(mobile_otp==''){
				jQuery('#mobile_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+mobile_otp+'&type=mobile',
					success:function(result){
						if(result=='done'){
							jQuery('.mobile_verify_otp').hide();
							jQuery('#mobile_otp_result').html('Mobile number verified');
							jQuery('#is_mobile_verified').val('1');
							if(jQuery('#is_email_verified').val()==1){
								jQuery('#btn_register').attr('disabled',false);
							}
						}else{
							jQuery('#mobile_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
		</script>
    </body> 
</html>
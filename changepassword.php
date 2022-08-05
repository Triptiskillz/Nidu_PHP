<?php include "navbar.php"?>
<link rel="stylesheet" href="assets/css/profile.css">
<?php 
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>


            <div class="row">
                <!-- <from method="POST"> -->
                <div class="leftcolumn">
                    <?php include "sidebar.php"?>
                </div>
                <div class="rightcolumn">
                    
                        <div class="wrapper">
                            <div class="profile-card_profile js-profile-card">
                                 <div class="profile-card__img">
                                      <img src="https://cdn4.vectorstock.com/i/1000x1000/49/83/forgot-password-concept-flat-vector-33384983.jpg" alt="profile"/>
                                 </div>
                                <!-- change password part -->

                                <div class="profile-card__cnt js-profile-cnt">
                                    
                                <form method="post" id="frmPassword">
									<div class="single-contact-form">
										<label class="password_label"  style="float:left;color: #CC9966;">Current Password</label>
										<div class="contact-box name">
											<input type="password" class="input_sidebar"  style="color: #CC9966;" name="current_password" id="current_password" style="width:100%">
										</div>
										<span class="field_error" id="current_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label"  style="float:left;color: #CC9966;">New Password</label>
										<div class="contact-box name">
											<input type="password" name="new_password"  style="color: #CC9966;" class="input_sidebar" id="new_password" style="width:100%">
										</div>
										<span class="field_error" id="new_password_error"></span>
									</div>
									<div class="single-contact-form">
										<label class="password_label"  style="float:left;color: #CC9966;">Confirm New Password</label>
										<div class="contact-box name">
											<input type="password" name="confirm_new_password" style="color: #CC9966;"  class="input_sidebar" id="confirm_new_password" style="width:100%">
										</div>
										<span class="field_error" id="confirm_new_password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button type="button" class="fv-btn btn1_sidebar" onclick="update_password()" id="btn_update_password">Update</button>
										
									</div>
								</form>
                                </div>
                  
                           </div>
                      </div>
                </div>
            </div>
        <!-- </div> -->
        <script>
		
		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
		</script>
        <?php include "footer.php"?>
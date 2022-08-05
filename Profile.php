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
                                      <img src="https://tse3.mm.bing.net/th?id=OIP.UgpNVxlmVIcTDs-qA6_qbAHaE8&pid=Api&P=0&w=289&h=193" alt="profile"/>
                                 </div>
                                
                                 <div class="profile-card__cnt js-profile-cnt">
                                     <form id="login-form" method="post">
							    		<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="username" id="username" placeholder="Your Name*"  class="profile-card__name input_profile" style="width:50% ;  text-align: center; font-size: 24px;font-weight: 500;" value="<?php echo $_SESSION['USER_NAME']?>">
										</div>
										
                                        <div class="contact-box name">
                                            
                                           <label style="float:left;color: #CC9966;" for="fname">Your Mobile :</label>
                                            <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*"  class="profile-card__name input_profile"style="width:50% ;   font-size: 16px;font-weight: 400;" value="<?php echo $_SESSION['USER_MOBILE']?>">
                                            
										</div>
										<span class="field_error" id="#mobile_error"></span>
                                        <div class="contact-box name">
                                            <label style="float:left; color: #CC9966;" for="fname">Your Professional:</label>
                                            <input type="text" name="professional" id="professional" placeholder="Your Professional*"  class="profile-card__name input_profile" style="width:50% ;   font-size: 16px;font-weight: 400;"value="<?php echo $_SESSION['USER_PROFESSIONAL']?>">
                                           
										</div>
										<span class="field_error" id="professional_error"></span>
                                        <div class="contact-box name">
                                           <label style="float:left; color: #CC9966;" for="fname">Your Address:</label>
                                            <input type="text" name="address" id="address" placeholder="Your Address*"  class="profile-card__name input_profile" style="width:50% ;  font-size: 16px;font-weight: 400;" value="<?php echo $_SESSION['USER_ADDRESS']?>">
                                            
										</div>
										<span class="field_error" id="address_error"></span>
                                        <div class="contact-box name">
                                            <label style="float:left; color: #CC9966;" for="fname">Your Email:</label>
                                            <input type="text" name="email" id="email" placeholder="Your Email*"  class="profile-card__name input_profile" style="width:50% ;   font-size: 16px;font-weight:400;" value="<?php echo $_SESSION['USER_EMAIL']?>">
                                           
										</div>
										<span class="field_error" id="#email_error"></span>
                                         <div class="contact-box name">
                                            <label style="float:left; color: #CC9966;" for="fname">Your Aadharcard:</label>
                                            <input type="text" name="aadharcard" id="aadharcard" placeholder="Your Aadharcard*"  class="profile-card__name input_profile" style="width:50% ;  font-size: 16px;font-weight: 400;" value="<?php echo $_SESSION['USER_AADHARCARD']?>">
										</div>
										<span class="field_error" id="aadharcard_error"></span>
									</div>
                                    <span class="field_error" id="name_error"></span>
									<div class="contact-btn">
										<button type="button" class="fv-btn btn1_sidebar" onclick="update_profile()" id="btn_submit">Update</button>
										
									</div>
								</form>
                               <a href="changepassword.php">Change Password</a>
                            </div>
                                <!-- change password part -->
                  
                           </div>
                      </div>
                </div>
            </div>
        <!-- </div> -->
        <script>
		function update_profile(){
			jQuery('.field_error').html('');
			var username=jQuery('#username').val();
            var email=jQuery("#email").val();
	        var mobile=jQuery("#mobile").val();
	        var professional=jQuery("#professional").val();
            var address=jQuery("#address").val();
            var aadharcard=jQuery("#aadharcard").val();
			if(username==''){
				jQuery('#name_error').html('Please enter your name');
            }if(email==""){
		        jQuery('#email_error').html('Please enter email');	
	        }if(mobile==""){
	        	jQuery('#mobile_error').html('Please enter mobile');
		    }if(professional==""){
		        jQuery('#professional_error').html('Please enter Professional'); 
            }if(address==""){
		        jQuery('#address_error').html('Please enter Address');
            }if(aadharcard==""){
		        jQuery('#aadharcard_error').html('Please enter Aadharcard');
	
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'username='+username+'&email='+email+'&mobile='+mobile+'&professional='+professional+'&address='+address+'&aadharcard='+aadharcard,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		
		
		</script>
        <?php include "footer.php"?>
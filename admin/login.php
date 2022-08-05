<?php 
require('connection.php'); 
require ('function.inc.php');

if (isset($_POST['signup'])) {
   $username=get_safe_value($con,$_POST['username']);
	$email=get_safe_value($con,$_POST['email']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$password=get_safe_value($con,$_POST['password']);



   $res=mysqli_query($con,"select * from admin_user where username='$username'");
   
    
	$check=mysqli_num_rows($res);
    //  echo "select * from admin_user where username='$username'";
	if(!$check >0){
		    mysqli_query($con,"insert into admin_user(username,password,email,mobile,role,status) values('$username','$password','$email','$mobile',1,1)");
          $msg="Wow! User Registration Completed.";
         }else{
				$msg="Username already exist";
			}
}

if(isset($_POST['submit'])){
   $username= get_safe_value($con,$_POST['username']);
   $password= get_safe_value($con,$_POST['password']);
   $sql="select * from admin_user where username='$username' and password='$password'";
   
     $result = mysqli_query($con,$sql);
     $count = mysqli_num_rows($result);

   if($count>0){
     $row=mysqli_fetch_assoc($result);
     if($row['status']=='0'){
        $msg="Account deactivated";	
     }else{
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_ID']=$row['id'];
        $_SESSION['ADMIN_USERNAME']=$username;
        $_SESSION['ADMIN_ROLE']=$row['role'];
        header('location:categories.php');
        die();
     }
   }else{
      $msg ="Please enter correct login details";
     
   }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../assets/css/signup.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <title>Nidu</title>
    </head>

    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="../assets/images/login.svg" alt="">
                </div>

                <div class="login__forms">
                    <!-- login part -->
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Sign In</h1>
                        
                        <div class="login__box1">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="username" class="login__input" placeholder="User Name" require>
                        </div>
    
                        <div class="login__box1">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password" class="login__input" placeholder="Password" require>
                        </div>

                        <a href="forgotpassword.php" class="login__forgot" id="forget-password">Forgot password?</a>

                        <button name="submit" class="login__button" >Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>
                     
                    <!-- signup part -->
                     
                    <form action="" class="login__create none" id="login-up" method="POST">
                        <h1 class="login__title">Create Account</h1>
                        <div class="field_error"> <script>alert(<?php echo $msg?>)</script> </div>
                         <div class="login__box1">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" name="username"  class="login__input" >
                                 
                               </div>

                         <div class="login__box1">
                            <i class='bx bx-at login__icon'></i>               
                           <input type="text" placeholder="Email"  name="email"   id="email"  class="login__input" >
                       </div>

           

                      <div class="login__box1">
                         <i class='bx bx-phone login__icon'></i>
                           <input type="text" placeholder="mobile" id="mobile"  name="mobile" class="login__input" >
                       </div>
        
                       <div class="login__box1">
                                     <i class='bx bx-lock-alt login__icon'></i>
                                     <input type="password" placeholder="Password" name="password" class="login__input" value="<?php echo $password?>" >
                           </div>

                       
                        <button name="signup" class="login__button" >Sign Up</button>
                       

                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <span class="login__signup"  id="sign-in"> Sign In</span>
                        </div>
                      
                  
                    </form>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="../assets/js/main.js"></script>
        
    </body> 
</html>
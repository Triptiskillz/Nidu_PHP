<?php include "navbar.php"?>
<?php
// require 'config.php';
   if(isset($_POST['forgetpassword'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);

    $emailquery ="select * from users  where email='$email'";
    $query =mysqli_query($conn,$emailquery);
    $emailcount = mysqli_num_rows($query);

    if($emailcount){

      $userdata = mysqli_fetch_array($query);

      $username = $userdata['name'];
      $token= $userdata['token'];

       $subject ="Password Reset";
       $body ="Hi , $username . Click here too reset your password
       http://localhost/nidu/reset_password.php?token=$token";
       $sender_email="From:triptics7619021664@gmail.com";

       if(mail($email,$subject,$body,$sender_email)){
           ?>
           <script>
            alert("<?php echo "Check you mail to Reset your account $email"?>");
            window.location="forgotpassword.php";
          </script>
            <?php
       }else{
        ?>
        <script>
         alert("<?php echo "Email sending failed.."?>");
         window.location="forgotpassword.php";
       </script>
         <?php
         
       }
       }
       else{
        ?>
        <script>
         alert("<?php echo "No Email found"?>");
         window.location="forgotpassword.php";
       </script>
         <?php
       }
    }
  ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css">
  <title>sdcsupermarke</title>
</head>
<body>

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
    
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/images/login.svg" alt="">
                </div>

                <div class="login__forms">
                    <!-- login part -->
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Forget Password</h1>
    
                        <div class="login__box1">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" class="login__input" name="email"  required>
                        </div>

                        <button  class="login__button"  name="forgetpassword" >Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/main.js"></script>
</body>
</html>
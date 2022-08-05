<?php
require 'config.php';
require('functions.inc.php');
   if(isset($_POST['resetpassword'])){
        if(isset($_GET['token'])){
           $token = $_GET ['token'];
        
          $password=mysqli_real_escape_string($conn,$_POST['password']);

          
          $pass = md5($password);
     
        $updatequerey ="update users set password ='$pass' where token='$token'";
        $iquery = mysqli_query($conn,$updatequerey);
        
          if($iquery){
            ?>
            <script>
               alert("<?php echo "Your Password Has been update"?>");
               window.location="signup.php";
              </script>
            <?php
          }else{ 
            ?>
            <script>
             alert("<?php echo "Your Password is not updated"?>");
             window.location="reset_password.php";
          </script>
            <?php
          }
       }else{
        ?>
        <script>
         alert("<?php echo "NO Token Found"?>");
         window.location="reset_password.php";
      </script>
        <?php
       }
    }
  ?>
      <title>Nidu</title>
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="assets/css/signup.css">

<div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/images/login.svg" alt="">
                </div>

                <div class="login__forms">
                    <!-- login part -->
                    <form action="" class="login__registre" id="login-in" method="POST">
                        <h1 class="login__title">Reset Password</h1>
    
                        <div class="login__box1">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Enter Password" class="login__input" name="password"  required>
                        </div>

                        <button  class="login__button"  type="submit"  name="resetpassword" value="resetpassword" >Submit</button>

                        
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/main.js"></script>

       <!-- <center style="margin-top:15%">
            <form class="modal-content animate" action="" method="post">
                <h2>Reset Password</h2>
                        <div class="container">
                        <input type="text" placeholder="Enter Password" name="password" required /><br/>            
                        <button type="submit"  name="resetpassword" class="btn btn--green" value="resetpassword">Submit</button>
                        </div>
                    </form>
          </center> -->
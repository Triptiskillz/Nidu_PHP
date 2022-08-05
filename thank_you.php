<?php include "navbar.php";
if (isset($_SESSION['USER_LOGIN'])) {
   ?>
    <center style="margin: 0 0 25% 0;">
             <img src="https://media.istockphoto.com/vectors/cute-cartoon-brown-bear-with-thank-you-banner-vector-id1345835840?b=1&k=20&m=1345835840&s=612x612&w=0&h=KfEIGbRWTqgkWHK4izclE1SUKy7NaHESqjoTpuuo53Y="/>
             <h1>Back to Home..</h1><br/>
             <a  href="home.php"  class='btn1_sidebar '>Home</a>
         </center>
<?php } ?>




<?php include "footer.php"?>
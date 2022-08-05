<?php require "navbar.php"?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/index.css">
<title>Nidu</title>
</head>
<?php 
$resBanner=mysqli_query($conn,"select * from banner where status='1' order by order_no asc");

// if (isset($_SESSION['USER_LOGIN'])) {
//     header("Location: home.php");
// }

?>

<body>
<div>
<?php if(mysqli_num_rows($resBanner)>0){
   while($rowBanner=mysqli_fetch_assoc($resBanner)){?>
              <!-- <h2><?php echo $rowBanner['heading1']?></h2>
              <h1><?php echo $rowBanner['heading2']?></h1>
              <?php
										if($rowBanner['btn_txt'] !='' && $rowBanner['btn_link']!=''){
											?>
											<div class="cr__btn">
												<a href="<?php echo $rowBanner['btn_link']?>"><?php echo $rowBanner['btn_txt']?></a>
											</div>
										<?php
										}
										 ?>  -->
            <img  class="hero" src="<?php echo BANNER_SITE_PATH.$rowBanner['image']?>"/>
            <?php }
             } ?>
                <div class="bg-text">
                <div class="container">
    
    <div class="content">
      <input class='input' type="radio" name="slider"  id="home"/>
      <input class='input'type="radio" name="slider" id="blog"/>
      <input class='input'type="radio" name="slider" id="help"/>
      <input class='input' type="radio" name="slider" id="code"/>
      <input class='input' type="radio" name="slider" id="about"/>
      <div class="list">
        <label for="home" class="home">
        <!-- <i class="fas fa-home"></i>  -->
        <span class="title">Hire</span>
      </label>
      <label for="blog" class="blog">
        <span class="icon"></span>
        <span class="title">Earn</span>
      </label>
      <label for="help" class="help">
        <span class="icon"></span>
        <span class="title">Repair</span>
      </label>
      <label for="code" class="code">
        <span class="icon"></span>
        <span class="title">Build</span>
      </label>
      
      <div class="slider"></div>
    </div>
      <div class="text-content">
        <div class="home text">
          <div class="title">Hire the best</div>
          <p>Find best worker near you</p>
          <form >
                    <input type="text" placeholder="Enter Destination" class="input_sidebar" name="name"/>
                    <input type="text" placeholder="Enter work " class="input_sidebar" name="mail"/>
                                   
                       <button class='btn4' >Quick</button>
                         <button class='btn5'>Find</button>
                                                
                  </form>
        </div>
        <div class="blog text">
        <div class="title">Earn near you</div>
          <p>Find work near your location or Host your service and get paid</p>
          <form>
                    <input type="text" placeholder="Enter Destination" class="input_sidebar" name="name"/>
                    <input type="text" placeholder="Enter work" class="input_sidebar" name="mail"/>
                                   
                       <button class='btn4' >Quick</button>
                         <button class='btn5'>Find</button>
                                                
                  </form>
        </div>
        <div class="help text">
        <div class="title">Fix your Place</div>
          <p>Repair any damage and fix any small or big problem</p>
          <form>
                    <input type="text" placeholder="Enter Destination"  class="input_sidebar" name="name"/>
                    <input type="text" placeholder="Enter work"  class="input_sidebar" name="mail"/>
                                   
                       <button class='btn4' >Quick</button>
                         <button class='btn5'>Find</button>
                                                
                  </form>
        </div>
        <div class="code text">
        <div class="title">Build your Place</div>
          <p>Find best people to build anything or decorate your place</p>
          <form>
                    <input type="text" placeholder="Enter Destination"  class="input_sidebar" name="name"/>
                    <input type="text" placeholder="Enter work"  class="input_sidebar" name="mail"/>
                                   
                       <button class='btn4' >Quick</button>
                         <button class='btn5'>Find</button>
                                                
                  </form>
        </div>
        </div>
    </div>
  </div>

                    </div>

 <!-- About us section -->
<div class="section">
		<div class="container3">
			<div class="content-section2">
				<div class="title">
					<h2>About <span>US</span></h2>
				</div>
				<div class="content2">
					<h3>Nidu is builds, repair, construction, service software we provide the service in which people are able to find worker according to their need</h3>
					<p>India is the biggest hub of working services. The worker works in different fields but still, the 
workers are unable to find the work which they want and most the people are not able to find 
workers according to their needs. As a result, we see unemployment everywhere, to decrease the 
unemployment we just try to manage problems which are facing by both workers and people by 
our project.<br/>
The purpose is to automate the existing manual system by the help of computerized equipments 
and full-fledged computer software, fulfilling their requirements, so that their valuable 
data/information can be stored for a longer period with easy accessing and manipulating of the 
workers records and jobs. The required software and hardware are easily available and esy to work 
with it.

</p>
					<div class="button">
						<a href="">Read More</a>
					</div>
				</div>
			</div>
			<div class="image-section">
				<img  className="img1" src='assets/images/about-us.svg '/>
			</div>
		</div>
	</div>
 <!-- team member  -->
  <div class="section1">
		<div class="container4">
			<div class="content-section3">
          <div class="main">   
             <div class="profile-card">
                 <div class="img">
                     <img src='assets/images/tripti.jpg '/>
                 </div>
                 <div class="caption">
                     <h3>Tripti Sharma</h3>
                     <p>Full Stact Developer</p>
                     <div class="social-links">
                          <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>  -->
                     </div>
                 </div>
             </div>
             <div class="profile-card">
                 <div class="img">
                     <img src='assets/images/shaskhi.jpeg'/>
                 </div>
                 <div class="caption">
                     <h3>Shakshi Sharma</h3>
                     <p>Front End Developer</p>
                     <div class="social-links">
                         <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>  -->
                     </div>
                 </div>
             </div>
             <div class="profile-card">
                 <div class="img">
                     <img src='assets/images/princy.jpeg '/>
                 </div>
                 <div class="caption">
                     <h3>Princy Varma</h3>
                     <p>Front End Developer</p>
                     <div class="social-links">
                          <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>  -->
                     </div>
                 </div>
             </div>
             <div class="profile-card">
                 <div class="img">
                     <img src='assets/images/ved.jpeg'/>
                 </div>
                 <div class="caption">
                     <h3>Ved Prakash </h3>
                     <p>Front End Developer</p>
                     <div class="social-links">
                          <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                         <a href="#"><i class="fab fa-instagram"></i></a>
                         <a href="#"><i class="fab fa-twitter"></i></a>  -->
                     </div>
                 </div>
             </div>
         </div>
     
      </div>
      <div class="image-section1">
         <h1 id="teamMemberheading">Team <span>Member</span></h1>
			</div>
		</div>
	</div>

 <!-- service part  -->
  <h1 id="serviceheading">Ser<span>vice</span></h1>
  <ul class="cards">
    <li>
  <div class="card_index">
      <div class="circle_index"></div>
         <div class="content_index">
             <h2>Hire</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
         </div>
         <img src="https://imgs.search.brave.com/UCKWYtAr_jXhuEZRnCeM5OCOp0vCxvaVDn10VkMkx7U/rs:fit:675:450:1/g:ce/aHR0cHM6Ly9jZG5p/Lmljb25zY291dC5j/b20vaWxsdXN0cmF0/aW9uL3ByZW1pdW0v/dGh1bWIvd2UtYXJl/LWhpcmluZy0yOTMx/OTkxLTI0NTkwNTku/cG5n"/>
  </div>
                        </li>
    <li>
  <div class="card_index">
      <div class="circle_index"></div>
         <div class="content_index">
             <h2>Build</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
         </div>
         <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Builder_by_mimooh.svg/1280px-Builder_by_mimooh.svg.png'/>
  </div>
                        </li>
                        <li>
  <div class="card_index">
      <div class="circle_index"></div>
         <div class="content_index">
             <h2>Repair</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
         </div>
         <img src='https://freesvg.org/img/car_mechanic.png'/>
  </div>
                        </li>
                        <li>
  <div class="card_index">
      <div class="circle_index"></div>
         <div class="content_index">
             <h2>Earn</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
         </div>
         <img src='https://psiphon.ca/main/boost.svg'/>
  </div>
                        </li>
                        </>

  </div>
                      
  </div>          
<?php include "footer.php"?>
</body>
</html>
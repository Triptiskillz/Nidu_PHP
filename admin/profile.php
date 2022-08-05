<?php
require('header.php');

if (isset($_POST["submit"])) {
    // $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $professional = mysqli_real_escape_string($conn, $_POST["professional"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $aadharcard = mysqli_real_escape_string($conn, $_POST["aadharcard"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $discribation = mysqli_real_escape_string($conn, $_POST["discribation"]);

        $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
        $photo_tmp_name = $_FILES["photo"]["tmp_name"];
        $photo_size = $_FILES["photo"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE users SET full_name='$full_name', password='$password', photo='$photo_new_name' WHERE id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
  
}

?> 
 <link rel="stylesheet" href="assets/css/profile.css">
 <div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Profile</h4>
				</div>
                    <div class="container">
                    <form action="/action_page.php">
                        <!-- <div class="row">
                        <div class="col-25">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="fname" name="name" placeholder="Your name..">
                        </div>
                        </div> -->
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Professional</label>
                        </div>
                        <div class="col-75">
                            <input type="text" value="<?php echo $row['full_name']; ?>" required id="lname" name="professional" placeholder="Your Job Titles..">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname"  value="<?php echo $row['full_name']; ?>" requiredname="phone" placeholder="Your Phone Number..">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Aadhar Card No.</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname"  value="<?php echo $row['full_name']; ?>" required name="aadharcard" placeholder="Your Aadhar Card  Number..">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Address</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname" value="<?php echo $row['full_name']; ?>" required name="address" placeholder="Your Address..">
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Email </label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="lname"  value="<?php echo $row['email']; ?>" required name="email" placeholder="Your Email :..">
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-25">
                            <label for="lname">Image</label>
                        </div>
                        <div class="col-75">
                            <input  type="file" id="photo"  name="photo">
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-25">
                            <label for="subject">Discribation</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" value="<?php echo $row['discribation']; ?>" required name="discribation" placeholder="Write Discribation.." style="height:200px"></textarea>
                        </div>
                        </div>
                        <div class="row">
                        <button type="submit"  name="submit" class="btn">Update Profile</button>
                        
                        </div>
                    </form>
                    </div>
  
                    </div>
		  </div>
	   </div>
	</div>
</div>

<?php
require('footer.php');
?>
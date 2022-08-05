<?php


$cat_res=mysqli_query($conn,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
?>


<link rel="stylesheet" href="assets/css/sidebar.css">
<link rel="stylesheet" href="assets/css/index.css">
<div>
            <div class="sidebar">
                <div class='margin'>
                 <div class="mytabs">
                      <input type="radio" id="tabHire" name="mytabs" checked="checked"/>
                              <label for="tabHire">
                                   
                                       <p>Hire</p>
                                </label>
                             
                                  <div class="tab">
                                      <form  action="search.php" method="GET">
                                               <div class="container2">
                                                    <input 
                                                    class="input_sidebar"
                                                    style="background:#fff;"

                                                   
                                                        type="text" 
                                                        placeholder="Search Worker.." 
                                                        name="str"
                                                    
                                                        />
                                                        
                                                    <!-- <input  style="background:#fff;"
                                                    class="input_sidebar"
                                                        type="text" 
                                                        placeholder="Enter Date"
                                                        name="password"
                                                    
                                                        /> -->
                                                </div>  
                                                 <div class="container2">
                                                         <!-- <a><button type="submit" class='btn2_sidebar '>Request</button></a>  -->
                                                         <a><button class='btn1_sidebar' type="submit" >Quick Book</button></a>  
                                                   </div>     
                                               </form>
                                      </div>
                                      <input type="radio" id="tabEarn" name="mytabs"/>
                                        <label for="tabEarn">
                                      
                                       <p>Earn</p>
                                        </label>
                                      <div class="tab">
                                      <form  action="search.php" method="GET">
                                             <div class="container2">
                                                    <input 
                                                    class="input_sidebar" style="background:#fff;"
                                                        type="text" 
                                                        placeholder="Search Worker.." 
                                                        name="str"
                                                    
                                                        />
                                                    
                                                    <!-- <input style="background:#fff;"
                                                    class="input_sidebar"
                                                        type="text" 
                                                        placeholder="Password"
                                                        name="password"
                                                    
                                                        /> -->
                                             </div>  
                                             <div class="container2">
                                             <!-- <a><button class='btn2_sidebar' type="submit">Request</button></a>  -->
                                             <a><button class='btn1_sidebar ' type="submit" >Quick Book</button></a>  
                                                </div>     
                                         </form>
                                        </div>
                                        <input type="radio" id="tabRepair" name="mytabs"/>
                                        <label for="tabRepair">
                                       <p>Repair</p>
                                       </label>
                                      <div class="tab">
                                         <form  action="search.php" method="GET">
                                             <div class="container2">
                                                    <input  style="background:#fff;"
                                                    class="input_sidebar"
                                                        type="text" 
                                                        placeholder="Search Worker.." 
                                                        name="str"
                                                    
                                                        />
                                                    
                                                    <!-- <input style="background:#fff;"
                                                    class="input_sidebar"
                                                        type="text" 
                                                        placeholder="Password"
                                                        name="password"
                                                    
                                                        /> -->
                                             </div>  
                                             <div class="container2">
                                                       <!-- <a><button class='btn2_sidebar' type="submit">Request</button></a>  -->
                                                       <a><button class='btn1_sidebar ' type="submit" >Quick Book</button></a>  
                                                </div>     
                                         </form>
                                        </div>
                                        <input type="radio" id="tabBuild" name="mytabs"/>
                                        <label for="tabBuild">
                                           
                                              <p>Build</p>
                                       </label>
                                          <div class="tab">
                                          <form  action="search.php" method="GET">
                                                     <div class="container2">
                                                        <input style="background:#fff;"
                                                        class="input_sidebar"
                                                            type="text" 
                                                            placeholder="Search Worker.." 
                                                            name="str"
                                                        
                                                            />
                                                    <!--                                                             
                                                        <input style="background:#fff;"
                                                        class="input_sidebar"
                                                            type="text" 
                                                            placeholder="Password"
                                                            name="password"
                                                        
                                                            /> -->
                                                     </div>  
                                                      <div class="container2">
                                                      <!-- <a><button class='btn2_sidebar' type="submit">Request</button></a>  -->
                                                       <a><button class='btn1_sidebar ' type="submit" >Quick Book</button></a>  
                                                         </div>     
                                                    </form>
                                                  </div>

                                 </div>   
                                 <div class="line"></div>
                                 <h2 class='line_header'>SKILLS</h2>
                                 <div class="line"></div>
                                    
                                 <main class='main_sidebar'>
                                        <section class="cards1">
                                          
                                            <?php
									         	foreach($cat_arr as $list){
											?>
                                            <div class="card1">
                                            <!-- <div class="card__image-container">
                                                <img
                                                src={repairlogo}
                                                alt="Detailed image description would go here."
                                                />
                                            </div> -->
                                            <a style="color:#4A2C2A;" href="workcategory.php?id=<?php echo $list['id']?>">
                                                     <p><?php echo $list['categories']?></p>
                                            </a>
                                            </div>
											<!-- <li></li> -->
											<?php
										}
										?>
                                        </section>
                                        </main>

                                 </div>
                             </div>
                           
                         </div>
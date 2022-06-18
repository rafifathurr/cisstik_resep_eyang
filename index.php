<?php
require 'function/function.php'; 
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Home"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area_index">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/bg-home.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    THE BEST
                                    </span>
                                    <br>
                                    CHEESE STICK
                                    <span>
                                    IN JAKARTA
                                    </span>
                                 </h1>
                                 <p>
                                    The best cheese sticks in Jakarta with 
                                    <span>
                                    premium ingredients, guaranteed and halal
                                    </span>
                                 </p>
                                 <div class="btn-box">
                                    <a href="product.php" class="btn1">
                                    Shop Now
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
         </section>
         <!-- end slider section -->
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
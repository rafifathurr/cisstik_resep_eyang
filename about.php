<?php require 'function/function.php';?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "About"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>
        
         <section class="about_section">
            <div class="left-half">
               <div class="left-half-detail">
                  <article>
                     <h1>About Us</h1>
                     <p>Cistik Resep Eyang is is a handmade cheese stick product which since 2013 was founded and managed by Randy located in West Jakarta. The products offered are made with quality, guaranteed and natural ingredients without preservatives and are certified by Halal MUI. </p>
                  </article>
               </div>
            </div>
            <div class="right-half">
               <div class="right-half-detail">
                  <article>
                     <img src="images/img-about-us.png" alt="">
                  </article>
               </div>
            </div>
         </section>
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
<?php
require 'function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "My Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area_cart">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>

         <div class="heading_container heading_center">
               <h2>
                  My Order
               </h2>
            </div>

         <section class="cart-section">
            <div class="cart-section-detail">
               <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 250gr</h5>
                        <h5 style="font-weight:600;">Rp. 45.000,-</h5>
                     </div>

                     <?php $count = 2;?>
                     <div class="add-items">
                        <p><?php echo $count;?></p>
                     </div>
                  </div>
               </div>
               <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 1000gr</h5>
                        <h5 style="font-weight:600;">Rp. 85.000,-</h5>
                     </div>

                     <?php $count = 1?>
                     <div class="add-items">
                        <p><?php echo $count;?></p>
                     </div>
                  </div>
               </div>
               <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 1000gr</h5>
                        <h5 style="font-weight:600;">Rp. 85.000,-</h5>
                     </div>

                     <?php $count = 1?>
                     <div class="add-items">
                        <p><?php echo $count;?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="status-order">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Status Order</h5>
                     <h5>No Resi</h5>
                  </div>
                  <?php $resi = 1234567?>
                  <div class="right-side-summary">
                     <h5 style="text-transform: uppercase;" class="status">Delivered</h5>
                     <h5 style="text-transform: uppercase;">JNT <?=$resi?></h5>
                  </div>
            </div>
         </section>

            <a href="https://cekresi.com/?noresi=<?=$resi?>" class="layout-btn-checkout-payment" target ="_blank">
               <input type="submit" class="btn-checkout-payment" value="TRACK SHIPPING">
            </a>
        
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
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
   <?php $currentPage = "Account"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>
        
         <section class="account-section">
            <div class="detail-account">
               <div class="part-section">
                  <a href="myaccount.php">
                     <img src="images/user.png" alt="">
                     <h4><?= name($mail);?></h4>
                  </a>
               </div>
               <div class="part-section">
                  <a href="myorder.php">
                     <img src="images/order.png" alt="">
                     <h4>My Order</h4>
                  </a>
               </div>
               <div class="part-section">
                  <a href="signout.php">
                     <img src="images/signout.png" alt="">
                     <h4>Sign Out</h4>
                  </a>
               </div>
            </div>
         </section>
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
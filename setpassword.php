<?php require 'function/function.php';?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Home"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <div class="form-login">
               <img src="images/Logo-Header.png" alt="">
               <div class="form-input">
                  <h6>Enter New Password</h6>
                  <input type="password" id="password" required>
               </div>
               <div class="form-input">
                  <h6>Re-Password</h6>
                  <input type="password" id="password" required>
               </div>
               <form action="index.php" method="POST" class="layer-btn">
                  <input type="submit" class="btn-login-signup" value="SET PASSWORD" id="setpass">
               </form>
            </div>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
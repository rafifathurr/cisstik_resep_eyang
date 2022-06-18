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
        
         <section class="my-account-section">
            <div class="profile-pict">
               <form action="" method="post" class="profile-detail">
                     <img src="images/user.png" alt="">
                     <div class="input-file">
                        <input type="file" name="file" id="pict-file" class="input-file-property">
                        <p>jpg, png, jpeg format</p>
                     </div>
                     <div class="layer-upload">
                        <button type="button" class="btn-upload" id="upload-file">UPLOAD</button>
                     </div>
                  </form>
            </div>
            <div class="profile-desc">
               <div class="center-desc">
               <div class="component-desc">
                  <h6>Name</h6>
                  <input type="text" value="Fino Muhammad Basri">
                  <a href="">Edit</a>
               </div>
               <div class="component-desc">
                  <h6>Email</h6>
                  <input type="text" value="Fino Muhammad Basri">
                  <a href="">Edit</a>
               </div>
               <div class="component-desc">
                  <h6>Phone</h6>
                  <input type="text" value="Fino Muhammad Basri">
                  <a href="">Edit</a>
               </div>
               <div class="component-desc">
                  <h6>Password</h6>
                  <input type="password">
                  <a href="">Change</a>
               </div>
               </div>
            </div>
         </section>
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
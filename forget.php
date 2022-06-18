<?php require 'function/function.php';?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Forgot Password"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <div class="form-login">
               <img src="images/Logo-Header.png" alt="">
               <div class="form-input">
                  <h6>Enter Your Email</h6>
                  <input type="text" id="codeverification">
               </div>
               <form action="" method="POST" class="layer-btn">
                  <button type="button" class="btn-login-signup" id="btn-forgot">VERIFICATION</button>
               </form>
            </div>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script>
         const btn = document.getElementById('btn-forgot');
         btn.addEventListener('click', function(){
            Swal.fire("Email Verification Successfully", 
            "Please Check Your Verification Code in Email!", 
            "success").then(function (result) {
               if (result.value) {
                  window.location = "verification.php";
                  }
            })});
      </script>
   </body>
</html>
<?php 
require 'function/function.php';

if(isset($_POST["forgot"])){

   $email = $_POST["email"];

   if(forgot($_POST)>0){

      $_SESSION["email"] = $email;
      $_SESSION["signin"]= true;
      $_SESSION["forgot"]= true;
      echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Verification Successfully',
               text: 'Please Set Up Your Password!',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'setpassword.php';
                       });}, 100);
         </script>";
  }else{
  echo"
  <script type='text/javascript'>
  setTimeout(function () { 
   Swal.fire('Verification Fails!', 
   'Your Email Not Register!', 
   'error');},100);
   </script>
  ";
  }
}
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Forgot Password"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <form action="" method="POST" class="form-login">
               <img src="images/Logo-Header.png" alt="">
               <div class="form-input">
                  <h6>Enter Your Email</h6>
                  <input type="text" id="email" name="email" autoCapitalize='none' required>
               </div>
               <div class="layer-btn">
                  <button class="btn-login-signup" name="forgot">VERIFICATION</button>
               </div>
            </form>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
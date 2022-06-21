<?php 

require 'function/function.php';

if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(isset($_POST["setpass"])){

   $email = $_POST["email"];

   if(setpass($_POST)>0){
      $_SESSION["email"] = $email;
      $_SESSION["signup"] = true;
      echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Password Successfully Set!',
               text: '',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'index.php';
                       });}, 100);
         </script>";;
  }else{
      echo "
      <script type='text/javascript'>
      Swal.fire('Sign Up Fail!', 
      'Please Sign Up Again!', 
      'error')
      </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Home"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <form action="" method="post">
            <div class="form-login">
               <img src="images/Logo-Header.png" alt="">
               <div class="form-input">
                  <h6>Enter New Password</h6>
                  <input type="hidden" name="email" value="<?=$_SESSION["email"];?>">
                  <input type="password" name="password" autoCapitalize='none' required>
               </div>
               <div class="form-input">
                  <h6>Re-Password</h6>
                  <input type="password" name="password2" autoCapitalize='none' required>
               </div>
               <div class="layer-btn">
                  <button class="btn-login-signup" name="setpass">SET PASSWORD</button>
               </div>
            </div>
            </form>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
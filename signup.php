<?php 

require 'function/function.php';

if(isset($_POST["register"])){

    $email = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    

        if(registrasi($_POST)>0){
            $_SESSION["email"] = $email;
            $_SESSION["signin"] = true;
            $_SESSION["signup"] = true;
            echo "
            <script type='text/javascript'>
               setTimeout(function () { 
                  let timerInterval
                  Swal.fire({
                     title: 'Sign Up Successfully!',
                     text: '',
                     icon: 'success',
                     type: 'success',
                     showConfirmButton: false
                 })
                     .then(function () {
                        window.location = 'index.php';
                             });}, 100);
               </script>";
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
   <?php $currentPage = "Sign Up"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <form action="" method="POST">
               <div class="form-login">
                  <img src="images/Logo-Header.png" alt="">
                  <div class="form-input">
                     <h6>Email</h6>
                     <input type="text" name="email" id="email" autoCapitalize='none' required>
                  </div>
                  <div class="form-input">
                     <h6>Full Name</h6>
                     <input type="text" name="name" id="name" autoCapitalize='none' required>
                  </div>
                  <div class="form-input">
                     <h6>Phone Number</h6>
                     <input type="text" name="phone" id="phone" autoCapitalize='none' required>
                  </div>
                  <div class="form-input">
                     <h6>Password</h6>
                     <input type="password" name="password" id="password" autoCapitalize='none' required>
                  </div>
                  <div class="form-input">
                     <h6>Re-Password</h6>
                     <input type="password" name="password2" id="password2" autoCapitalize='none' required>
                  </div>
                  <button class="btn-login-signup" name="register">SIGN UP</button>
                  <div class="sign-in-selection">
                     <p>Have an Account?</p>
                     <a href="signin.php">Sign In</a>
                  </div>
               </div>
            </form>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
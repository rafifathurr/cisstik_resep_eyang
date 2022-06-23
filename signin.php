<?php

require 'function/function.php';

if(isset($_SESSION["signin"])){
   header("Location: index.php");
   exit;
}

// cek cookie
if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
   $id = $_COOKIE['id'];
   $key = $_COOKIE['key'];

   // Ambil username berdasarkan id
   $result = mysqli_query($conn,"SELECT email from user WHERE user_id = $id");
   $row = mysqli_fetch_assoc($result);

   // Cek Cookie
   if($key === hash('sha256', $row['email'])){
       $_SESSION['login'] = true;
   }
}

if(isset($_POST["signin"])){

   $email = $_POST["email"];
   $password = $_POST["password"];
   
   $query = "SELECT * FROM user 
               WHERE email = '$email'";

   $result = mysqli_query($conn, $query);

   // cek username
   if( mysqli_num_rows($result) === 1){

       // cek password
       $row = mysqli_fetch_assoc($result);
       if(password_verify($password, $row["password"])){
         $_SESSION["signin"] = true;
         $_SESSION["email"] = $email;
         // Check Remember Me
         if(isset($_POST['remember'])){
            // membuat cookie

            setcookie('id', $row['id'],time()+60);
            setcookie('key', hash('sha256',$row['email']),time()+60);
        }
         echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Please Wait!',
               timer: 1500,
               didOpen: () => {
               Swal.showLoading()
               const b = Swal.getHtmlContainer().querySelector('b')
               timerInterval = setInterval(() => {
               b.textContent = Swal.getTimerLeft()
               }, 1000)
               },
               willClose: () => {
               clearInterval(timerInterval)
               }
               }).then((result) => {
               if (result.dismiss === Swal.DismissReason.timer) {
                  window.location='index.php';
               }
               })}, 100);
         </script>";
         
       }else{
         $_SESSION["email"] = '';
         echo "
         <script type='text/javascript'>
            setTimeout(function () { Swal.fire('Login Failed!', 
               'Invalid Email or Password!', 
               'error')}, 100);
            </script>
         ";
       }
   }
}
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Sign In"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
         <form action="" method="POST">
            <div class="form-login">
               <img src="images/Logo-Header.png" alt="">
               <div class="form-input">
                  <h6>Email</h6>
                  <input type="text" id="email" name="email" autoCapitalize='none' required>
               </div>
               <div class="form-input">
                  <h6>Password</h6>
                  <input type="password" id="password" name="password" autoCapitalize='none' required>
               </div>
               <div class="additional-section">
                  <div class="remember-me-section">
                     <input type="checkbox" id="cookie" name="cookie">
                     <p>Remember Me</p>
                  </div>
                  <div class="forget-password-section">
                     <a href="forget.php">Forgot Password?</a>
                  </div>
               </div>
               <button class="btn-login-signup" name="signin">SIGN IN</button>
               <div class="sign-up-selection">
                  <p>Don't Have an Account?</p>
                  <a href="signup.php">Sign Up</a>
               </div>
            </div>
         </form>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
<?php

require '../function/function.php';

if(isset($_SESSION["signin"])){
   header("Location: neworder.php");
   exit;
}

if(isset($_POST["signin"])){

   $username = $_POST["username"];
   $password = $_POST["password"];
   
   $query = "SELECT * FROM admin 
               WHERE username = '$username'";

   $result = mysqli_query($conn, $query);

   // cek username
   if( mysqli_num_rows($result) === 1){

       // cek password
       $row = mysqli_fetch_assoc($result);
       if(password_verify($password, $row["password"])){
         $_SESSION["signin"] = true;
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
                  window.location='neworder.php';
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
      <div class="hero_area_admin">
         <div class="background"></div>
         <section class="login-page">
         <form action="" method="POST">
            <div class="form-login">
               <img src="../images/Logo-Header-Admin.png" alt="">
               <div class="form-input">
                  <h6>Email</h6>
                  <input type="text" id="username" name="username" required>
               </div>
               <div class="form-input">
                  <h6>Password</h6>
                  <input type="password" id="password" name="password" required>
               </div>
               <button class="btn-login-signup" name="signin">SIGN IN</button>
            </div>
         </form>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
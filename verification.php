<?php 

require 'function/function.php';

if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(!isset($_SESSION["forgot"])){
   if(isset($_POST["verif-signup"])){

      $email = $_SESSION["email"];
      $code = $_POST["codeverification"];
      
      $query = "SELECT * FROM user 
                  WHERE email = '$email'";
   
      $result = mysqli_query($conn, $query);
   
      // cek username
      if( mysqli_num_rows($result) === 1){
   
          // cek password
          $row = mysqli_fetch_assoc($result);
          if($code == $row["verification_code"]){
            $_SESSION["signin"] = true;
            $_SESSION["email"] = $email;
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
               let timerInterval
               Swal.fire({
                  title: 'Verification Successfully',
                  text: 'Enjoy Your Shop!',
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
               setTimeout(function () { Swal.fire('Verification Failed!', 
                  'Invalid Code!', 
                  'error')}, 100);
               </script>
            ";
          }
      }
   }
}else{
   if(isset($_POST["verif-signup"])){

      $email = $_SESSION["email"];
      $code = $_POST["codeverification"];
      
      $query = "SELECT * FROM user 
                  WHERE email = '$email'";
   
      $result = mysqli_query($conn, $query);
   
      // cek username
      if( mysqli_num_rows($result) === 1){
   
          // cek password
          $row = mysqli_fetch_assoc($result);
          if($code == $row["verification_code"]){
            $_SESSION["signin"] = true;
            $_SESSION["email"] = $email;
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
               let timerInterval
               Swal.fire({
                  title: 'Please Set Up Your Password',
                  text: '',
                  icon: 'success',
                  type: 'success',
                  showConfirmButton: false
              })
                  .then(function () {
                     window.location = 'setpassword.php';
                          });}, 100);
            </script>";
          }else{
            echo "
            <script type='text/javascript'>
               setTimeout(function () { Swal.fire('Verification Failed!', 
                  'Invalid Code!', 
                  'error')}, 100);
               </script>
            ";
          }
      }
   }
}



?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Verification"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         <section class="login-page">
            <form action="" method="POST">
               <div class="form-login">
                  <img src="images/Logo-Header.png" alt="">
                  <div class="form-input">
                     <h6>Enter Verification Code</h6>
                     <input type="text" id="codeverification" name="codeverification" required>
                  </div>
                  <button class="btn-login-signup" name="verif-signup">VERIFICATION</button>
               </div>
            </form>
         </section>
      </div>
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
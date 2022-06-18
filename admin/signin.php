<!-- <?php

// // Call Session
// session_start();
// if(isset($_SESSION["signin"])){
//    header("Location: index.php");
//    exit;
// }

// require '../function/function.php';

// if(isset($_POST["signin"])){

//    $email = $_POST["email"];
//    $password = $_POST["password"];
   
//    $query = "SELECT * FROM user 
//                WHERE email = '$email'";

//    $result = mysqli_query($conn, $query);

//    // cek username
//    if( mysqli_num_rows($result) === 1){

//        // cek password
//        $row = mysqli_fetch_assoc($result);
//        if(password_verify($password, $row["password"])){
//          $_SESSION["signin"] = true;
//          $_SESSION["email"] = $email;
//          echo "
//             <script type='text/javascript'>
//             setTimeout(function () { Swal.fire('Login Successfully', 
//                '', 
//                'success').then(function (result) {
//                if (result.value) {
//                   window.location = 'index.php';
//                   }
//             })}, 100);
//             </script>
//             ";
//        }else{
//          echo "
//          <script type='text/javascript'>
//             setTimeout(function () { Swal.fire('Login Failed!', 
//                'Invalid Email or Password!', 
//                'error')}, 100);
//             </script>
//          ";
//        }
//    }
// }
?> -->
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
                  <input type="text" id="email" name="email" required>
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
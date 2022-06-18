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
   <?php $currentPage = "Payment"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         
         <!-- include navbar -->
         <?php include 'partials/nav_logo.php'?>
        
         <div class="heading_container heading_center_payment">
               <h2>
                  Payment
               </h2>
         </div>

      <section class="payment-section">
         <div class="left-half-payment">
            <h6>Please Transfer To :</h6>
            <div class="bank-section">
               <img src="images/bca-logo.png" alt="">
               <h5>123456 a/n Randy</h5>
            </div>
            <h6>Or Scan QRIS</h6>
            <div class="scan-section">
               <img src="images/qris.png" alt="">
               <div class="barcode-section">
                  <img src="images/barcode.jpeg" alt="">
               </div>
            </div>
            <div class="cart-summary-payment">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Shopping Summary</h5>
                     <h6>Total Item (2 Items)</h6>
                     <h6>Shipping Cost 2kg</h6>
                     <h5 style="text-transform: uppercase;">Grand Total</h5>
                  </div>
                  <div class="right-side-summary">
                     <br>
                     <h6>Rp. 175.000,-</h6>
                     <h6>Rp. 15.000,-</h6>
                     <h5 style="text-transform: uppercase;">Rp. 175.000,-</h5>
                  </div>
               </div>
            </div>
      </div>
      <div class="vertical-line"></div>
         <div class="right-half-payment">
            <h6>Please Verification with Upload Invoice of Transfer</h6>
            <input type="file" name="gambar" id="gambar" class="upload">
            <p>png, jpg, jpeg format</p>
            <form action="" method="post">
               <button type="button" class="btn-verif-transaction" id="btn_verif_pay">VERIFICATION</button>
            </form>
            
         </div>
      </section>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script>
         const btn = document.getElementById('btn_verif_pay');
         btn.addEventListener('click', function(){
            Swal.fire("Your Verification Successfully", 
            "Your order will be proccessed!", 
            "success").then(function (result) {
               if (result.value) {
                  window.location = "index.php";
                  }
            })});
      </script>
   </body>
</html>
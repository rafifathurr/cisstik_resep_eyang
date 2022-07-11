<?php
require 'function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}
if(!isset($_SESSION["payment"])){
   header("Location: index.php");
   exit;
}
if(isset($_POST["btn_verif_pay"])){

   $gambar = $_FILES["upload"];

   if(uploadpayment($_POST)>0){
      echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Payment Successfully',
               text: 'Please Wait Until We Accept Your Order!',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'index.php';
                       });}, 100);
         </script>";
   }else{
   }
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
            <?php 
               $data = query("SELECT cp.invoice_id, sum(cp.qty) as qty, sum(cp.total_price) as total_price
               from cart_payment cp
               where cp.user_id = $id and cp.status_order='wait payment'
               ");
               $data_ongkir = query("SELECT cp.total_price as price
               from cart_payment cp
               where cp.user_id = $id and cp.status_order='wait payment' and cp.product_id = 0
               ");
               $qty = '';
               $price ='';
               $ongkir = '';
               $total_price = '';
               foreach($data as $d):
                  foreach($data_ongkir as $do):
                     $qty = $d["qty"];
                     $price = $d["total_price"];
                     $ongkir = $do["price"];
                     $total_price = $d["total_price"]+$do["price"];
            ?>
            <?php endforeach;?>
            <?php endforeach;?>
            <div class="cart-summary-payment">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Shopping Summary</h5>
                     <h6>Total Item (<?=$qty;?> Items)</h6>
                     <h6>Shipping Cost 2kg</h6>
                     <h5 style="text-transform: uppercase;">Grand Total</h5>
                  </div>
                  <div class="right-side-summary">
                     <br>
                     <h6>Rp. <?=$price;?>,-</h6>
                     <h6>Rp. <?=$ongkir;?>,-</h6>
                     <h5 style="text-transform: uppercase;">Rp. <?=$total_price;?>,-</h5>
                  </div>
               
               </div>
            </div>
         </div>
            <div class="vertical-line"></div>
            <form method="post" class="right-half-payment" enctype="multipart/form-data">
               <h6>Please Verification with Upload Invoice of Transfer</h6>
               <input type="hidden" value="<?=$d["invoice_id"];?>" name="invoice_id">
               <input type="file" name="upload" id="upload" required>
               <p>png, jpg, jpeg format</p>
               <button class="btn-verif-transaction" name="btn_verif_pay">VERIFICATION</button>
            </form>
      </section>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
<?php 
require 'function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}
if(!isset($_SESSION["checkout"])){
   header("Location: index.php");
   exit;
}
if(isset($_POST["payment"])){
   if(addshipping($_POST)>0){
      $_SESSION["payment"] = true;
      echo "
        <script type='text/javascript'>
        setTimeout(function () { Swal.fire('Checkout Successfully', 
           'Please Do Payment!', 
           'success').then(function (result) {
           if (result.value) {
              window.location = 'payment.php';
              }
        })}, 100);
        </script>
        ";
   }else{
      echo "
      GAGAL
      ";
   }
}
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Cart"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <form method="post" class="hero_area">
         
         <?php include 'partials/nav_logo.php'?>
        
         <input type="hidden" name="user_id" value="<?=$id;?>">
         <div class="heading_container heading_center_checkout">
            <h2>
               Checkout
            </h2>
         </div>
         <section class="checkout-section">
            <h5>Shipping Address</h5>
            <div class="checkout-form-layer-1">
               <div class="recipient-form">
                  <p>Recipient Name</p>
                  <input type="text" placeholder="Recipient Name" name="recipient" required>
               </div>
               <div class="phone-form">
                  <p>Phone Number</p>
                  <input type="text" placeholder="Phone Number" name="phone" required>
               </div>
            </div>
            <div class="checkout-form-layer-2">
               <div class="province-form">
                  <p>Province</p>
                  <input type="text" placeholder="Province" name="province" required>
               </div>
               <div class="city-form">
                  <p>City</p>
                  <input type="text" placeholder="City" name="city" required>
               </div>
               <div class="district-form">
                  <p>District</p>
                  <input type="text" placeholder="District" name="district" required>
               </div>
               <div class="zip-form">
                  <p>Zip Code</p>
                  <input type="text" placeholder="Zip Code" name="zip" required>
               </div>
            </div>
            <div class="checkout-form-layer-3">
               <div class="address-form">
                  <p>Address</p>
                  <input type="text" placeholder="Fill With Full Address and Number in Detail" name="address" required>
               </div>
            </div>
            <div class="checkout-form-layer-4">
               <div class="note-form">
                  <p>Note Shipping</p>
                  <input type="text" placeholder="Note Shipping" name="note">
               </div>
               <div class="shipping-form">
                  <p>Shipping-type</p>
                  <input type="text" placeholder="REGULAR 2-3 DAYS" disabled>
                  <input type="hidden" name="shiptype" value="REG">
               </div>
            </div>
            <?php 
               $ongkir = 20000;
               $data = query("SELECT cp.invoice_id, sum(cp.qty) as qty, format(sum(cp.total_price),0) as total_price_view, sum(cp.total_price) as total_price
               from cart_payment cp
               where cp.user_id = $id and cp.status_order='checkout'
               ");
               foreach($data as $d):
               ?>
            <input type="hidden" value="<?=$d["invoice_id"];?>" name="invoice_id">
            <input type="hidden" value="<?=$ongkir;?>" name="ongkir">
            <div class="cart-summary">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Shopping Summary</h5>
                     <h6>Total Item (<?=$d["qty"];?> Items)</h6>
                     <h6>Shipping Cost 2kg</h6>
                     <h5 style="text-transform: uppercase;">Grand Total</h5>
                  </div>
                  <div class="right-side-summary">
                     <br>
                     <h6>Rp. <?=$d["total_price"];?>,-</h6>
                     <h6>Rp. <?=$ongkir;?>,-</h6>
                     <h5 style="text-transform: uppercase;">Rp. <?=$d["total_price"]+$ongkir;?>,-</h5>
                  </div>
            </div>
            <?php endforeach;?>
         </section>
         <div class="layout-btn-checkout-payment">
            <button class="btn-checkout-payment" name="payment">PAYMENT</button>
         </div>
      </form>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
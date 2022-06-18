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
   <?php $currentPage = "Cart"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">
         
      <?php include 'partials/nav_logo.php'?>
        
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
                  <input type="text" placeholder="Recipient Name" id="recipient">
               </div>
               <div class="phone-form">
                  <p>Phone Number</p>
                  <input type="text" placeholder="Phone Number" id="phone">
               </div>
            </div>
            <div class="checkout-form-layer-2">
               <div class="province-form">
                  <p>Province</p>
                  <select id="province" name="province">
                     <option value="">Choose Province</option>
                  </select>
               </div>
               <div class="city-form">
                  <p>City</p>
                  <select id="city" name="city">
                     <option value="">Choose City</option>
                  </select>
               </div>
               <div class="district-form">
                  <p>District</p>
                  <input type="text" placeholder="District" id="district">
               </div>
               <div class="zip-form">
                  <p>Zip Code</p>
                  <input type="text" placeholder="Zip Code" id="zip">
               </div>
            </div>
            <div class="checkout-form-layer-3">
               <div class="address-form">
                  <p>Address</p>
                  <input type="text" placeholder="Fill With Full Address and Number in Detail" id="address">
               </div>
            </div>
            <div class="checkout-form-layer-4">
               <div class="note-form">
                  <p>Note Shipping</p>
                  <input type="text" placeholder="Note Shipping" id="note">
               </div>
               <div class="shipping-form">
                  <p>Shipping-type</p>
                  <input type="text" placeholder="REGULAR 2-3 DAYS" id="shiptype" disabled>
               </div>
            </div>
            <div class="cart-summary">
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
</section>
      <form action="payment.php" method="POST" class="layout-btn-checkout-payment">
               <input type="submit" class="btn-checkout-payment" value="PAYMENT">
            </form>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
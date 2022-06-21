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
   <?php $currentPage = "My Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area_cart">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>

         <div class="heading_container heading_center">
               <h2>
                  My Order
               </h2>
            </div>

         <?php
         $invoice = $_GET["invoice_id"];
         $orders = query("SELECT p.id, cp.invoice_id, 
         CASE WHEN cp.product_id != 0 THEN p.product 
         WHEN cp.product_id = 0 THEN 'Shipping Costs' END as product, SUM(cp.qty) as qty, FORMAT(cp.price,0) as price , cp.resi, cp.status_order 
         FROM cart_payment cp 
         LEFT JOIN product p ON p.id = cp.product_id WHERE cp.user_id = $id AND cp.invoice_id='$invoice' 
         GROUP BY cp.product_id ORDER BY cp.id ASC");
         ?>
         <section class="cart-section">
            <div class="cart-section-detail">
            <?php foreach($orders as $order):
               if($order['product']!="Shipping Costs"):?>
               <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5><?=$order['product'];?></h5>
                        <h5 style="font-weight:600;">Rp. <?=$order['price'];?>,-</h5>
                     </div>

                     <div class="add-items">
                        <p><?=$order['qty'];?></p>
                     </div>
                  </div>
               </div>
               <?php else:?>
                  <div class="cart-detail">
                  <div class="detail">

                     <img src="images/jne.png" alt="">

                     <div class="description">
                        <h5><?=$order['product'];?></h5>
                        <h5 style="font-weight:600;">Rp. <?=$order['price'];?>,-</h5>
                     </div>

                     <div class="add-items">
                        <p><?=$order['qty'];?></p>
                     </div>
                  </div>
               </div>
               <?php endif;?>
            <?php endforeach;?>
               <!-- <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 1000gr</h5>
                        <h5 style="font-weight:600;">Rp. 85.000,-</h5>
                     </div>

                     <?php $count = 1?>
                     <div class="add-items">
                        <p><?php echo $count;?></p>
                     </div>
                  </div>
               </div>
               <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 1000gr</h5>
                        <h5 style="font-weight:600;">Rp. 85.000,-</h5>
                     </div>

                     <?php $count = 1?>
                     <div class="add-items">
                        <p><?php echo $count;?></p>
                     </div>
                  </div>
               </div> -->
            </div>
            <div class="status-order">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Status Order</h5>
                     <h5>No Resi</h5>
                  </div>
                  <div class="right-side-summary">
                     <h5 style="text-transform: uppercase; text-align:right;" <?= ($order["status_order"] == 'Delivery') ? "class='status'" : "";?>><?=$order["status_order"];?></h5>
                     <h5 style="text-transform: uppercase; text-align:right;"><?=$order["resi"];?></h5>
                  </div>
            </div>
         </section>

            <a href="https://cekresi.com/?noresi=<?=$order["resi"];?>" class="layout-btn-checkout-payment" target ="_blank">
               <input type="submit" class="btn-checkout-payment" value="TRACK SHIPPING">
            </a>
        
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
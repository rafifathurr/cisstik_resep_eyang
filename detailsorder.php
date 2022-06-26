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
                  Details Order
               </h2>
            </div>

         <?php
         $invoice = $_GET["invoice_id"];
         $orders = query("SELECT p.id, cp.invoice_id, 
         CASE WHEN cp.product_id != 0 THEN p.product 
         WHEN cp.product_id = 0 THEN 'Shipping Costs' END as product, SUM(cp.qty) as qty, FORMAT(cp.price,0) as price , cp.resi, 
         CASE WHEN cp.status_order = 'waiting for confirm' THEN 'Waiting For Confirm'
            WHEN cp.status_order = 'cancel' THEN 'Cancel'
            WHEN cp.status_order != 'waiting for confirm' THEN cp.status_order END as status_order
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
            </div>
            <?php if($order["status_order"] == 'Cancel'):?>
            <?php $canceled = query("SELECT r.reason FROM reject r 
               LEFT JOIN cart_payment cp ON cp.invoice_id = r.invoice_id 
               WHERE cp.user_id = $id AND cp.invoice_id=$invoice
               GROUP BY cp.invoice_id"); 
               foreach($canceled as $cancel):?>
            <div class="status-order" >
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Status Order</h5>
                     <h5>Reason</h5>
                  </div>
                  <div class="right-side-summary">
                     <h5 style="text-transform: uppercase; text-align:right;" <?= ($order["status_order"] == 'Cancel') ? "class='status_2'" : "";?>><?=$order["status_order"];?></h5>
                     <h5 style="text-transform: uppercase; text-align:right;"><?=$cancel["reason"];?></h5>
                  </div>
               </div>
            </div>
            <?php endforeach;?>
            <?php elseif($order["status_order"] == 'Delivery'):?>
            <div class="status-order" >
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
            </div>
            <?php else:?>
               <div class="status-order" >
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Status Order</h5>
                     <h5>No Resi</h5>
                  </div>
                  <div class="right-side-summary">
                     <h5 style="text-transform: uppercase; text-align:right;"><?=$order["status_order"];?></h5>
                     <h5 style="text-transform: uppercase; text-align:right;">-</h5>
                  </div>
               </div>
            </div>
            <?php endif;?>
               
         </section>

         <?php if($order["status_order"] == 'Delivery'):?>
            <div class="track">
            <a href="https://cekresi.com/?noresi=<?=$order["resi"];?>" class="layout-btn-track" target ="_blank">
               <input type="submit" class="btn-track" value="TRACK SHIPPING">
            </a>
            </div>
         <?php endif;?>

            
        
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
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
      <div class="hero_area_cart">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>

         <div class="heading_container heading_center">
               <h2>
                  My Cart
               </h2>
            </div>

         <section class="cart-section">

         <?php if(isset($_POST["add"])):?>
            <div class="cart-section-detail">
               <div class="cart-detail">
                  <div class="detail">
                     <img src="images/bg-home.jpg" alt="">
                     <div class="description">
                        <h5><?= $_POST["product"];?></h5>
                        <h5 style="font-weight:600;">Rp. <?= $_POST["price"];?>,-</h5>
                     </div>

                     <div class="add-items">
                        <?php $count = $_POST["qty"];?>
                        
                        <i class="fa fa-trash trash" id="trash" onclick="remove()"></i>
                        <i class="fa fa-minus-circle plus-minus" id="minus" onclick="minus()"<?php echo ($count == 1) ? "style='background-color:grey;'" : ""; ?> ></i>
                        <p><?=$count;?></p>
                        <i class="fa fa-plus-circle plus-minus" id="plus" onclick="plus()"></i>
                     </div>
                  </div>
               </div>
               <!-- <div class="cart-detail">
                  <div class="detail">

                     <img src="images/bg-home.jpg" alt="">

                     <div class="description">
                        <h5>Cheese Stick Original / 1000gr</h5>
                        <h5 style="font-weight:600;">Rp. 85.000,-</h5>
                     </div>

                     <?php $count = 1?>
                     <div class="add-items">
                        <i class="fa fa-trash trash" id="trash"></i>
                        <span id="minus">
                           <i class="fa fa-minus-circle plus-minus" id="minus" <?php echo ($count == 1) ? "style='background-color:grey;'" : ""; ?> ></i>
                        </span>
                        <p><?php echo $count;?></p>
                        <i class="fa fa-plus-circle plus-minus" id="plus"></i>
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
                        <i class="fa fa-trash trash" id="trash"></i>
                        <span id="minus">
                           <i class="fa fa-minus-circle plus-minus" id="minus" <?php echo ($count == 1) ? "style='background-color:grey;'" : ""; ?> ></i>
                        </span>
                        <p><?php echo $count;?></p>
                        <i class="fa fa-plus-circle plus-minus" id="plus"></i>
                     </div>
                  </div>
               </div> -->
            </div>
            <?php endif;?>
            
            <div class="cart-summary">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Shopping Summary</h5>
                     <h6>Total Item (2 Items)</h6>
                     <h5 style="text-transform: uppercase;">Grand Total</h5>
                  </div>
                  <div class="right-side-summary">
                     <br>
                     <h6>Rp. 175.000,-</h6>
                     <h5 style="text-transform: uppercase;">Rp. 175.000,-</h5>
                  </div>
            </div>
            
            

         </section>

         <form action="checkout.php" method="POST" class="layout-btn-checkout-payment">
               <input type="submit" class="btn-checkout-payment" value="CHECKOUT">
            </form>
        
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script>
         function remove(){
            <?php $_POST["add"] = '';?>
            window.location="cart.php"
         }
         function plus(){
            <?php $count = $count++;?>
         }
      </script>
   </body>
</html>
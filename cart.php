<?php

require 'function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(isset($_POST["remove"])){
   if(removecart($_POST)>0){
   }else{
      echo "
      GAGAL
      ";
   }
}
if(isset($_POST["add"])){
   if(addcart($_POST)>0){
   }else{
      echo "
      GAGAL
      ";
   }
}
if(isset($_POST["minus"])){
   if(minus($_POST)>0){
   }else{
      echo "
      GAGAL
      ";
   }
}
if(isset($_POST["checkout"])){
   if(checkout($_POST)>0){
      $_SESSION["checkout"] = true;
      header("Location: checkout.php");
      exit;
   }else{
      echo "
         <script type='text/javascript'>
            setTimeout(function () { Swal.fire('Please Add Product First!', 
               '', 
               'error')}, 100);
            </script>
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
      <div class="hero_area_cart">
         
         <!-- include navbar -->
         <?php include 'partials/navbar.php'?>

         <div class="heading_container heading_center">
               <h2>
                  My Cart
               </h2>
            </div>
            
         <section class="cart-section">
            <div class="cart-section-detail">
               <?php 
                  $show_cart = query("SELECT p.id, cp.invoice_id, p.product, SUM(cp.qty) as qty, cp.price as price FROM cart_payment cp LEFT JOIN product p ON p.id = cp.product_id WHERE cp.user_id = $id AND cp.status_order='cart' GROUP BY cp.product_id");
               foreach($show_cart as $cart):?>
               <div class="cart-detail">
                  <div class="detail">
                     <img src="images/bg-home.jpg" alt="">
                     <div class="description">
                        <h5><?= $cart["product"];?></h5>
                        <h5 style="font-weight:600;">Rp. <?= $cart["price"];?>,-</h5>
                     </div>
                     <form method="post" class="add-items">
                        <input type="hidden" value="<?= $id;?>" name="user_id">
                        <input type="hidden" name="product_id" value="<?=$cart["id"];?>">
                        <input type="hidden" name="price" value="<?=$cart["price"];?>">
                        <input type="hidden" name="qty" value=1>
                        <button name="remove" style="background-color:transparent;border:none;">
                           <i class="fa fa-trash trash" id="trash"></i>
                        </button>
                        <button name="minus" <?php echo ($cart["qty"] == 1) ? "disabled" : ""; ?> style="background-color:transparent;border:none;">
                           <i class="fa fa-minus-circle plus-minus" id="minus"<?php echo ($cart["qty"] == 1) ? "style='background-color:grey;'" : ""; ?> ></i>
                        </button>
                        <p><?= $cart["qty"];?></p>
                        <button name="add" style="background-color:transparent;border:none;">
                           <i class="fa fa-plus-circle plus-minus" id="plus"></i>
                        </button>
                     </form>
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
               
               <?php endforeach;?>
            </div>
            <?php 
               $data = query("SELECT sum(cp.qty) as qty, format(sum(cp.total_price),0) as total_price
               from cart_payment cp
               where cp.user_id = $id and cp.status_order='cart'
               ");
               foreach($data as $d):
               ?>
            <div class="cart-summary">
               <div class="detail">
                  <div class="left-side-summary">
                     <h5>Shopping Summary</h5>
                     <h6>Total Item (<?= $d["qty"];?> Items)</h6>
                     <h5 style="text-transform: uppercase;">Grand Total</h5>
                  </div>
                  <div class="right-side-summary">
                     <br>
                     <h6>Rp. <?= $d["total_price"];?>,-</h6>
                     <h5 style="text-transform: uppercase;">Rp. <?= $d["total_price"];?>,-</h5>
                  </div>
            </div>
            <?php endforeach;?>
            
         </section>

         <form action="" method="POST" class="layout-btn-checkout-payment">
               <input type="hidden" value="<?= $id;?>" name="user_id">
               <input type="submit" class="btn-checkout-payment" name="checkout" value="CHECKOUT">
            </form>
        
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script>
         document.ge tElementById("num").innerHTML = num;
         document.getElementById("total").value = num;
         function remove(){
            <?php unset($_SESSION['qty']); ?>
            <?php unset($_SESSION['id']); ?>
            window.location="cart.php"
         }
         function plus(){
            <?php $qty = $qty++;
            echo $qty;?>
            
         }
         function minus(){
            num--;
            document.getElementById("num").innerHTML = num;
            document.getElementById("total").value = num;
         }
      </script>
   </body>
</html>
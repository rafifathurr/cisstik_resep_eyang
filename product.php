<?php 
require 'function/function.php';
$product = query("SELECT * FROM product ORDER BY order_id ASC");

if(isset($_POST["add"])){
   if(addcart($_POST)>0){
      header("Location: cart.php");
      exit;
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
   <?php $currentPage = "Products"; ?>
   <?php include 'partials/head.php'?>

   <body class="sub_page">
      <div class="hero_area">

         <!-- header section strats -->
         <?php include 'partials/navbar.php'?>

      
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our Products
               </h2>
            </div>
            
            <div class="row">
            <?php foreach($product as $row):?>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <form action="" method="post" class="options">
                              <input type="hidden" value="<?= $id;?>" name="user_id">
                              <input type="hidden" value="<?= $row["id"];?>" name="product_id">
                              <input type="hidden" value=1 name="qty">
                              <input type="hidden" value="<?= $row["price"];?>" name="price">
                              <button class="option1" name="add">
                                 Add To Cart
                              </button>
                           </form>
                     </div>
                     <div class="img-box">
                        <img src="img/<?php echo $row["picture"];?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        <?php echo $row["product"];?>
                        </h5>
                        <h6>
                        Rp. <?php echo $row["price"];?>,-
                        </h6>
                     </div>
                  </div>
               </div>
               <?php endforeach;?>
            </div>
         </div>
      </section>
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?> 
   </body>
</html>
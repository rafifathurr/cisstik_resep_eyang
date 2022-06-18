<?php require 'function/function.php';?>
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
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add to Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/bg-home.jpg" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Original / 250gr
                        </h5>
                        <h6>
                        Rp. 25.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <form action="cart.php" method="post">
                           <?php $product= "Cheese Stick Original / 500gr";?>
                           <?php $price=45000;?>
                              <input type="hidden" value="<?= $product?>" name="product">
                              <input type="hidden" value="<?= $price?>" name="price">
                              <input type="hidden" value=1 name="qty">
                              <button class="option1" name="add">
                                 Add To Cart
                              </button>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p2.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        <?= $product;?>
                        </h5>
                        <h6>
                        Rp. <?= $price;?>,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p3.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Original / 1000gr
                        </h5>
                        <h6>
                        Rp. 85.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p4.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Original / 2000gr
                        </h5>
                        <h6>
                        Rp. 170.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p5.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Spicy / 250gr
                        </h5>
                        <h6>
                        Rp. 30.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p6.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Spicy / 500gr
                        </h5>
                        <h6>
                        Rp. 55.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p7.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Spicy / 1000gr
                        </h5>
                        <h6>
                        Rp. 110.000
                        </h6>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Add To Cart
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="images/p8.png" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        Cheese Stick Spicy / 2000gr
                        </h5>
                        <h6>
                        Rp. 210.000,-
                        </h6>
                     </div>
                  </div>
               </div>
               
         </div>
      </section>
      </div>

      <!-- include footer -->
      <?php include 'partials/footer.php'?> 
   </body>
</html>
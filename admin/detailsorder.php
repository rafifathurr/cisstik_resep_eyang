<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Details Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="details-order">
         <div class="heading_container heading_center">
               <h2>
                  Details Order
               </h2>
            </div>
            <div class="component-details">
               <div class="left-component">
                  <div class="left-component-details">
                     <div class="desc">
                        <h6>Invoice : </h6>
                        <h6>INV/123/123/2022</h6>
                     </div>
                     <div class="desc">
                        <h6>Recepient : </h6>
                        <h6>Fino Basri</h6>
                     </div>
                  </div>
               </div>
               <div class="right-component">
                  <div class="right-component-details">
                     <div class="desc">
                        <h6>Address : </h6>
                        <h6>Jalan Biola VI No.120, Sukmajaya, Mekarjaya, <br> Depok, Jawa Barat 16411</h6>
                     </div>
                     <div class="desc">
                        <h6>User : </h6>
                        <h6>Rafi Fathur Rahman</h6>
                     </div>
                  </div>
               </div>
               <div class="right-component">

               </div>
            </div>
            <table cellpadding="10" cellspacing="1" style="background-color:white;">
               <tr>
                  <th>No</th> 
                  <th>Products</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total Price</th>
               </tr>
            </table>
         </section>
         <div class="btn-layout-details">
            <form action="" method="POST">
               <button class="reject" name="submit" value="cancel">REJECT ORDER</button>
               <button class="accept" name="submit" value="process">ACCEPT ORDER</button>
            </form>
         </div>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
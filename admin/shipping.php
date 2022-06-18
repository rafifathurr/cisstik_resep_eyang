<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Shipping Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="new-order">
         <div class="heading_container heading_center">
               <h2>
                  Shipping Order
               </h2>
            </div>
            <table cellpadding="10" cellspacing="1" style="background-color:white;">
        <tr>
            <th>No</th>
            <th>Invoice</th>
            <th>User</th>
            <th>Recepient</th>
            <th>Address</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
    </table>

         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
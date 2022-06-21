<?php 

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

$product = query("SELECT * from product order by order_id ASC");

?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Products"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="new-order">
            <div class="heading_container heading_center">
               <h2>
                  MANAGING PRODUCTS
               </h2>
            </div>
            <form method="post" class="btn-tambah">
               <button name="tambah">
               <i class="fa fa-plus" aria-hidden="true"></i>
                  Add Product
               </button>
            </form>

            <table cellpadding="10" border="1" cellspacing="1" style="background-color:white;">
               <tr>
                  <th>No</th>
                  <th>Product</th>
                  <th>Picture</th>
                  <th>Order</th>
                  <th>Action</th>
               </tr>

               <?php $i=1;?>
               <?php foreach($product as $prod): ?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?=$prod["product"];?></td>
                  <td><?=$prod["picture"];?></td>
                  <td><?=$prod["order_id"];?></td>
                  <td>
                     <a href="detailsorder.php?invoice_id=<?= $prod["id"];?>">Edit</a> 
                     <a href="detailsorder.php?invoice_id=<?= $prod["id"];?>">Delete</a> 
                  </td>
               </tr>
               <?php $i++;?>
               <?php endforeach;?>
            </table>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
<?php 

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(isset($_POST["add"])){
   if(addproduct($_POST)>0){
      echo "
            <script type='text/javascript'>
               setTimeout(function () { 
                  let timerInterval
                  Swal.fire({
                     title: 'Product Successfully Added!',
                     text: '',
                     icon: 'success',
                     type: 'success',
                     showConfirmButton: false
                 })
                     .then(function () {
                        window.location = 'products.php';
                             });}, 100);
               </script>";
   }
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

            <?php if(isset($_POST["tambah"])):?>
            <div>
               <form method="post" enctype="multipart/form-data">
                  <div>
                     <label for="product">Name Product</label>
                     <input type="text" id="product" name="product">
                  </div>
                  <div>
                     <label for="upload">Upload File</label>
                     <input type="file" id="upload" name="upload">
                  </div>
                  <div>
                     <label for="price">Price</label>
                     <input type="text" id="price" name="price">
                  </div>
                  <div>
                     <label for="order">Ordering</label>
                     <input type="text" id="order" name="order">
                  </div>         
                  <button name="kembali">Kembali</button>
                  <button name="add">Add Product</button>
               </form>
            </div>
            <?php elseif(isset($_POST["kembali"])):?>
               <?php endif;?>
            

            <table cellpadding="10" border="1" cellspacing="1" style="background-color:white;">
               <tr>
                  <th>No</th>
                  <th>Product</th>
                  <th>Picture</th>
                  <th>Price</th>
                  <th>Order</th>
                  <th>Action</th>
               </tr>

               <?php $i=1;?>
               <?php foreach($product as $prod): ?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?=$prod["product"];?></td>
                  <td><a href="download.php?filename=<?php echo $prod["picture"];?>"><?php echo $prod["picture"];?></a></td>
                  <td>Rp. <?=$prod["price"];?>,-</td>
                  <td><?=$prod["order_id"];?></td>
                  <td>
                     <a href="detailsorder.php?invoice_id=<?= $prod["id"];?>">Edit</a> 
                     <a href="deletedproduct.php?id=<?= $prod["id"];?>">Delete</a> 
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
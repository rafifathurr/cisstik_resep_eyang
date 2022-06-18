<?php 
if(isset($_POST['tambah'])){
   echo "
   <script type='text/javascript'>
   setTimeout(function () { 
      Swal.fire({
         title: 'Add Product',
         html: `
         <form action='' method='post'>
         <div class='form-product'>
            <label for='product'>Name Product</label> 
            <input type='text' id='product' class='swal2-input' placeholder='Product' require>
         </div>
         <div class='form-product'>
            <label for='product'>Image</label> 
            <input type='file' id='file' class='input-file-popup' placeholder='Product'>
         </div>
         <p class='format-type'>png, jpeg, jpg format only</p>
         <div class='form-product'>
            <label for='order'>Order Number</label> 
            <input type='text' id='order' class='swal2-input' placeholder='Order' require>
         </div>
         </form>`,
         confirmButtonText: 'Add Product',
         confirmButtonColor: '#C56807', 
         preConfirm: () => {
            const product = Swal.getPopup().querySelector('#product').value
            const file = Swal.getPopup().querySelector('#file').value
            const order = Swal.getPopup().querySelector('#order').value
            if (!product || !file || !order) {
              Swal.showValidationMessage(`Please enter the data`)
            }
            return { product: product, file: file, order: order }
          }
        }).then((result) => {
        })}, 100);
   </script>
   ";
}
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

            <table cellpadding="10" cellspacing="1" style="background-color:white;">
               <tr>
                  <th>No</th>
                  <th>Product</th>
                  <th>Picture</th>
                  <th>Order</th>
                  <th>Action</th>
               </tr>
            </table>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(isset($_POST["accept"])){
   
   if(acceptorder($_POST)>0){
      echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Order Succesfully Processed!',
               text: '',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'process.php';
                       });}, 100);
         </script>";
   }
   // if(rejectorder($_POST)>0){
   //    echo "
   //    <script type='text/javascript'>
   //       setTimeout(function () { 
   //          let timerInterval
   //          const swalWithBootstrapButtons = Swal.mixin({
   //             customClass: {
   //               confirmButton: 'btn btn-success',
   //               cancelButton: 'btn btn-danger'
   //             },
   //             buttonsStyling: false
   //           })
             
   //           swalWithBootstrapButtons.fire({
   //             title: 'Are you sure?',
   //             text: 'You want to cancel this order!',
   //             icon: 'warning',
   //             showCancelButton: true,
   //             confirmButtonText: 'Cancel Order',
   //             cancelButtonText: 'No',
   //             reverseButtons: true
   //           }).then((result) => {
   //             if (result.isConfirmed) {
   //               swalWithBootstrapButtons.fire(
   //                 'Cancelled!',
   //                 'Your file has been deleted.',
   //                 'success'
   //               )
   //             }
   //           });}, 100);
   //       </script>";
   // }
}

if($_SESSION["menu"]=="neworder"){
   // $order = "neworder";
   $invoice = $_GET["invoice_id"];
   $shipping = query("SELECT cp.invoice_id, s.recipient, cp.order_date, CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, u.full_name as user, cp.proof_payment as gambar
   from cart_payment cp
   left join user u on u.user_id = cp.user_id
   left join shipping s on s.invoice_id = cp.invoice_id
   where cp.status_order = 'waiting for confirm' and cp.invoice_id = $invoice
   group by cp.invoice_id");
   
   $details = query("SELECT CASE WHEN cp.product_id != 0 THEN p.product 
   WHEN cp.product_id = 0 THEN 'Ongkos Kirim' END as product, 
   FORMAT(cp.price,0) as price, sum(cp.qty) as qty , FORMAT(sum(cp.total_price),0) as total_price, cp.proof_payment as gambar
   from cart_payment cp
   left join product p on p.id = cp.product_id
   where cp.status_order = 'waiting for confirm'and cp.invoice_id = $invoice
   group by cp.product_id, cp.invoice_id order by cp.id asc");

}else if($_SESSION["menu"]=="process"){
   $invoice = $_GET["invoice_id"];
   $shipping = query("SELECT cp.invoice_id, s.recipient, cp.order_date, 
   CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, u.full_name as user, cp.proof_payment as gambar
   from cart_payment cp
   left join user u on u.user_id = cp.user_id
   left join shipping s on s.invoice_id = cp.invoice_id
   where cp.status_order = 'On Process' and cp.invoice_id = $invoice
   group by cp.invoice_id");
   
   $details = query("SELECT CASE WHEN cp.product_id != 0 THEN p.product 
   WHEN cp.product_id = 0 THEN 'Ongkos Kirim' END as product, 
   FORMAT(cp.price,0) as price, sum(cp.qty) as qty , FORMAT(sum(cp.total_price),0) as total_price, cp.proof_payment as gambar
   from cart_payment cp
   left join product p on p.id = cp.product_id
   where cp.status_order = 'On Process'and cp.invoice_id = $invoice
   group by cp.product_id, cp.invoice_id order by cp.id asc");

}else{
   $invoice = $_GET["invoice_id"];
   $shipping = query("SELECT cp.invoice_id, s.recipient, cp.order_date, 
   CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, u.full_name as user, cp.proof_payment as gambar
   from cart_payment cp
   left join user u on u.user_id = cp.user_id
   left join shipping s on s.invoice_id = cp.invoice_id
   where cp.status_order = 'Delivery' and cp.invoice_id = $invoice
   group by cp.invoice_id");
   
   $details = query("SELECT CASE WHEN cp.product_id != 0 THEN p.product 
   WHEN cp.product_id = 0 THEN 'Ongkos Kirim' END as product, 
   FORMAT(cp.price,0) as price, sum(cp.qty) as qty , FORMAT(sum(cp.total_price),0) as total_price, cp.proof_payment as gambar
   from cart_payment cp
   left join product p on p.id = cp.product_id
   where cp.status_order = 'Delivery'and cp.invoice_id = $invoice
   group by cp.product_id, cp.invoice_id order by cp.id asc");
}



?>
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
            <?php foreach($shipping as $ship):?>
            <div class="component-details">
               <div class="left-component">
                  <div class="left-component-details">
                     <div class="desc">
                        <h6>Invoice : </h6>
                        <h6>INV/<?= $ship["invoice_id"];?>/<?= $ship["order_date"];?></h6>
                     </div>
                     <div class="desc">
                        <h6>Recepient : </h6>
                        <h6><?= $ship["recipient"];?></h6>
                     </div>
                     <div class="desc">
                        <h6>Order Date : </h6>
                        <h6><?= $ship["order_date"];?></h6>
                     </div>
                  </div>
               </div>
               <div class="right-component">
                  <div class="right-component-details">
                     <div class="desc">
                        <h6>Address : </h6>
                        <h6><?= $ship["address"];?></h6>
                     </div>
                     <div class="desc">
                        <h6>User : </h6>
                        <h6><?= $ship["user"];?></h6>
                     </div>
                     <div class="desc">
                        <h6>Approval : </h6>
                        <h6><a href="download.php?filename=<?php echo $ship["gambar"];?>"><?php echo $ship["gambar"];?></a></h6>
                     </div>
                  </div>
               </div>
            </div>
            <?php endforeach;?>

            <table cellpadding="10" cellspacing="1" border="1" style="background-color:white;">
               <tr>
                  <th>No</th> 
                  <th>Products</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total Price</th>
               </tr>
               <?php $i=1;?>
               <?php foreach($details as $new):?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?=$new["product"];?></td>
                  <td style="text-align:right;">Rp. <?=$new["price"];?>,-</td>
                  <td><?=$new["qty"];?></td>
                  <td style="text-align:right;">Rp. <?=$new["total_price"];?>,-</td>
               </tr>
               <?php $i++;?>
               <?php endforeach;?>
            </table>
         </section>
         <?php if($_SESSION["menu"]=="neworder"):?>
         <div class="btn-layout-details">
            <form action="" method="POST">
               <input type="hidden" name="invoice" id="id" value="<?=$invoice?>">
               <button class="reject" name="reject" >REJECT ORDER</button>
               <button class="accept" name="accept" >ACCEPT ORDER</button>
            </form>
         </div>
         <?php elseif($_SESSION["menu"]=="process"):?>
         <!-- <div class="btn-layout-details">
         <form action="" method="POST">
            <input type="hidden" name="invoice" id="id" value="<?=$invoice?>">
            <button class="accept" name="deliv" >DELIVER</button>
         </form>
         </div> -->
         <?php else:?>
         <div class="btn-layout-details">
            <button typw="button" class="accept" name="deliv" disabled>ON DELIVERY</button>
         </div>
         <?php endif;?>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
   </body>
</html>
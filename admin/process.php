<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

if(isset($_POST["resi"])){
   if(delivery($_POST)>0){
      echo "
      <script type='text/javascript'>
         setTimeout(function () { 
            let timerInterval
            Swal.fire({
               title: 'Order Succesfully Deliver!',
               text: '',
               icon: 'success',
               type: 'success',
               showConfirmButton: false
           })
               .then(function () {
                  window.location = 'shipping.php';
                       });}, 100);
         </script>";
   }
}

$orders = query("SELECT cp.invoice_id, cp.order_date, u.full_name as user, s.recipient, 
CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, FORMAT(sum(cp.total_price),0) as total_price
from cart_payment cp
left join user u on u.user_id = cp.user_id
left join shipping s on s.invoice_id = cp.invoice_id
where cp.status_order = 'On Process'
group by cp.invoice_id
order by cp.id DESC");
?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Process Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="new-order">
         <div class="heading_container heading_center">
               <h2>
                  Process Order
               </h2>
            </div>
            <table cellpadding="10" border="1" cellspacing="1" style="background-color:white;">
        <tr>
            <th>No</th>
            <th>Order Date</th>
            <th>Invoice</th>
            <th>User</th>
            <th>Recepient</th>
            <th>Address</th>
            <th>Total Price</th>
            <th>Action</th>
            <th>Input Resi</th>
        </tr>

        <?php $i=1;?>
        <!-- Menampilkan data dari database menggunakan PHP -->
        <?php foreach($orders as $order): ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?=$order["order_date"];?></td>
            <td>INV/<?=$order["invoice_id"];?>/<?=$order["order_date"];?></td>
            <td><?=$order["user"];?></td>
            <td><?=$order["recipient"];?></td>
            <td><?=$order["address"];?></td>
            <td style="text-align:right;">Rp. <?=$order["total_price"];?>,-</td>
            <td>
                <a href="detailsorder.php?invoice_id=<?= $order["invoice_id"]; $_SESSION["menu"]="process";?>">Details</a> 
            </td>
            <td>
               <form action="" method="post" class="input-resi">
                  <input type="hidden" value="<?=$order["invoice_id"];?>" name="invoice">
                  <input type="text" placeholder ="Input Resi" name="resi">
               </form>
            </td>

        </tr>
        <?php $i++;?>
        <?php endforeach;?>

         </table>

         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script src="../js/script.js"></script>
   </body>
</html>
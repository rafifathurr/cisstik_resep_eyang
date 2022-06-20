<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

$neworder = query("SELECT cp.invoice_id, u.full_name as user, s.recipient, CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, sum(cp.total_price) as total_price
from cart_payment cp
left join user u on u.user_id = cp.user_id
left join shipping s on s.invoice_id = cp.invoice_id
where cp.status_order = 'waiting for confirm'
group by cp.invoice_id
order by cp.order_date DESC");

?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "New Order"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="new-order">
         <div class="heading_container heading_center">
               <h2>
                  New Order
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
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        <!-- Menampilkan data dari database menggunakan PHP -->
        <?php foreach($neworder as $new): ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?=$new["invoice_id"];?></td>
            <td><?=$new["user"];?></td>
            <td><?=$new["recipient"];?></td>
            <td><?=$new["address"];?></td>
            <td><?=$new["total_price"];?></td>
            <td>
                <a href="detailsorder.php?invoice_id=<?= $new["invoice_id"];?>">Details</a> 
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
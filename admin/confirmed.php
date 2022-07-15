<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

$shipping = query("SELECT cp.invoice_id, cp.order_date, u.full_name as user, s.recipient, 
CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, 
FORMAT(sum(cp.total_price),0) as total_price, cp.resi, cp.status_order
from cart_payment cp
left join user u on u.user_id = cp.user_id
left join shipping s on s.invoice_id = cp.invoice_id
where cp.status_order = 'Confirmed'
group by cp.invoice_id
order by cp.id DESC");

?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "Confirmed"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <section class="new-order">
         <div class="heading_container heading_center">
               <h2>
                  Confirmed Order
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
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php $i=1;?>
        <!-- Menampilkan data dari database menggunakan PHP -->
        <?php foreach($shipping as $ship): ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?=$ship["order_date"];?></td>
            <td>INV/<?=$ship["invoice_id"];?>/<?=$ship["order_date"];?></td>
            <td><?=$ship["user"];?></td>
            <td><?=$ship["recipient"];?></td>
            <td><?=$ship["address"];?></td>
            <td style="text-align:right;">Rp. <?=$ship["total_price"];?>,-</td>
            <td><?=$ship["status_order"];?></td>
            <td>
                <a href="detailsorder.php?invoice_id=<?= $ship["invoice_id"];?><?php $_SESSION["menu"]="confirmed";?>">Details</a>
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
<?php

require '../function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}

$shipping = query("SELECT cp.invoice_id, cp.order_date, u.full_name as user, s.recipient, 
CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, 
FORMAT(sum(cp.total_price),0) as total_price, cp.resi, cp.proof_payment
from cart_payment cp
left join user u on u.user_id = cp.user_id
left join shipping s on s.invoice_id = cp.invoice_id
where cp.status_order = 'Delivery'
group by cp.invoice_id
order by cp.order_date DESC");

?>
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
            <th>Bukti Transfer</th>
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
            <td>
                <a href="detailsorder.php?invoice_id=<?= $ship["invoice_id"];?><?php $_SESSION["menu"]="delivery";?>">Details</a> |
                <a href="https://cekresi.com/?noresi=<?= $ship["resi"];?>" target='_blank'>Track</a>
            </td>
            <td><?=$ship["proof_payment"];?></td>
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
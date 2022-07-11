<?php 

require 'function/function.php';
if(!isset($_SESSION["signin"])){
   header("Location: signin.php");
   exit;
}



?>
<!DOCTYPE html>
<html>
   <!-- include head  -->
   <?php $currentPage = "My Orders"; ?>
   <?php include 'partials/head.php'?>

   <body>
      <div class="hero_area">

         <!-- include navbar  -->
         <?php include 'partials/navbar.php'?>

         <?php 
            $myorder = query("SELECT cp.invoice_id, cp.order_date, s.recipient, 
            CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, 
            FORMAT(sum(cp.total_price),0) as total_price, 
            CASE WHEN cp.status_order = 'waiting for confirm' THEN 'Waiting For Confirm'
            WHEN cp.status_order = 'cancel' THEN 'Cancel'
            WHEN cp.status_order != 'waiting for confirm' THEN cp.status_order END as status_order, cp.resi
            from cart_payment cp
            left join user u on u.user_id = cp.user_id
            left join shipping s on s.invoice_id = cp.invoice_id
            where (cp.status_order != 'cart' and cp.status_order != 'checkout' and cp.status_order != 'wait payment') and cp.user_id = $id
            group by cp.invoice_id
            order by cp.id DESC");
            
            ?>

         <section class="new-order">
            <div class="heading_container heading_center">
               <h2>
                  MY ORDERS
               </h2>
            </div>
            <div class="btn-tambah">
               <input type="hidden" value="<?=$id?>" id="id" name="id">
               <select id="status" name="status" style="text-align:center;">
                  <option selected="true" value="" disabled="disabled">- Choose Status -</option>  
                  <option value="">All</option> 
                  <option value="waiting for confirm">Waiting For Confirm</option>
                  <option value="On Process">On Process</option>
                  <option value="Delivery">On Delivery</option>
                  <option value="cancel">Cancel</option>
               </select> 
               <button onclick="filter()">FILTER</button>
            </div>



          <div id="container">
            <table cellpadding="10" border="1" cellspacing="1" style="background-color:white;">
            <tr>
               <th>No</th>
               <th>Order Date</th>
               <th>Invoice</th>
               <th>Recepient</th>
               <th>Address</th>
               <th>Total Price</th>
               <th>Status</th>
               <th>Action</th>
            </tr>

               <?php $i=1;?>
               <?php foreach($myorder as $my): ?>
               <tr>
                  <td><?php echo $i;?></td>
                  <td><?=$my["order_date"];?></td>
                  <td>INV/<?=$my["invoice_id"];?>/<?=$my["order_date"];?></td>
                  <td><?=$my["recipient"];?></td>
                  <td><?=$my["address"];?></td>
                  <td style="text-align:right;">Rp. <?=$my["total_price"];?>,-</td>
                  <td <?php if($my["status_order"] == 'Delivery'){
                        echo "style='color:#50DF1E;'";
                  }if($my["status_order"] == 'Cancel'){
                     echo "style='color:red;'";
                   }else{
                     echo "style='color:black;'";
                   };?>>
                  <?=$my["status_order"];?> </td>
                  <td>
                     <?php if($my["status_order"]=='Delivery'):?>
                        <form action="" method="post">
                           <input type="hidden" id="id_order" value="<?=$my["invoice_id"]?>">
                           <a href="detailsorder.php?invoice_id=<?= $my["invoice_id"];?>">Details</a> |
                           <a href="https://cekresi.com/?noresi=<?= $my["resi"];?>" target="_blank">Track</a>
                        </form>
                     <?php else:?>
                        <a href="detailsorder.php?invoice_id=<?= $my["invoice_id"];?>">Details</a> 
                     <?php endif;?>
                  </td>
               </tr>
               <?php $i++;?>
               <?php endforeach;?>
            </table>
         </div>
         </section>
      </div>
      
       <!-- include footer -->
      <?php include 'partials/footer.php'?>
      <script src="js/script.js"></script>
   </body>
</html>
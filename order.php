<?php 

require 'function/function.php';

$status= $_GET["status"];
$id= $_GET["id"];

if($status!=""){
   $myorder = query("SELECT cp.invoice_id, cp.order_date, s.recipient, 
            CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, 
            FORMAT(sum(cp.total_price),0) as total_price, 
            CASE WHEN cp.status_order = 'waiting for confirm' THEN 'Waiting For Confirm'
            WHEN cp.status_order != 'waiting for confirm' THEN cp.status_order END as status_order, cp.resi
            from cart_payment cp
            left join user u on u.user_id = cp.user_id
            left join shipping s on s.invoice_id = cp.invoice_id
            where (cp.status_order != 'cart' and cp.status_order != 'checkout' and cp.status_order = '$status') and cp.user_id = $id 
            group by cp.invoice_id
            order by cp.order_date DESC");

}else{
   $myorder = query("SELECT cp.invoice_id, cp.order_date, s.recipient, 
            CONCAT(s.address, ' ', s.district, ' ', s.city, ' ',s.province) as address, 
            FORMAT(sum(cp.total_price),0) as total_price, 
            CASE WHEN cp.status_order = 'waiting for confirm' THEN 'Waiting For Confirm'
            WHEN cp.status_order != 'waiting for confirm' THEN cp.status_order END as status_order, cp.resi
            from cart_payment cp
            left join user u on u.user_id = cp.user_id
            left join shipping s on s.invoice_id = cp.invoice_id
            where (cp.status_order != 'cart' and cp.status_order != 'checkout') and cp.user_id = $id 
            group by cp.invoice_id
            order by cp.order_date DESC");
}

            

?>
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
                  <td <?= ($my["status_order"] == 'Delivery') ? "style='color:#50DF1E;'" : "";?>><?=$my["status_order"];?></td>
                  <td>
                     <?php if($my["status_order"]=='Delivery'):?>
                        <a href="detailsorder.php?invoice_id=<?= $my["invoice_id"];?>">Details</a> |
                        <a href="https://cekresi.com/?noresi=<?= $my["resi"];?>" target="_blank">Track</a> 
                     <?php else:?>
                        <a href="detailsorder.php?invoice_id=<?= $my["invoice_id"];?>">Details</a> 
                     <?php endif;?>
                  </td>
               </tr>
               <?php $i++;?>
               <?php endforeach;?>
            </table>


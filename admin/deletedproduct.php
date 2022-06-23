<?php

require '../function/function.php';

if(isset($_GET["id"])){
   if(removeproduct($_GET)>0){
     echo "
     <script type='text/javascript'>
        setTimeout(function () { 
           let timerInterval
           Swal.fire({
              title: 'Product Successfully Deleted!',
              text: '',
              icon: 'success',
              type: 'success',
              showConfirmButton: false
          })
              .then(function () {
                 window.location = 'products.php';
                      });}, 100);
        </script>";
   }else{
      echo "GAGAL";
   }
}

include 'partials/footer.php'
?>
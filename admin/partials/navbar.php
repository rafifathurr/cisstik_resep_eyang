<!DOCTYPE html>
<html>
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="neworder.php"><img src="../images/Logo-Header-Admin.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li <?php echo ($currentPage == 'New Order') ? "class='nav-item active'" : "class='nav-item'"; ?> >
                            <a class="nav-link" href="neworder.php">New Order</a>
                        </li>
                        <li <?php echo ($currentPage == 'Process Order') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="process.php">Process</a>
                        </li>
                        <li <?php echo ($currentPage == 'Shipping Order') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="shipping.php">Shipping</a>
                        </li>
                        <li <?php echo ($currentPage == 'Products') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="products.php">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link-logout" href="signout.php">
                              LOG OUT
                           </a> 
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>

         </header>
</html>
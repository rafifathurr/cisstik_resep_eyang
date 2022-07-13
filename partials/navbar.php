<?php 

if(isset($_SESSION["email"])):
   $mail = $_SESSION["email"];
else:
   $mail ='';
endif;

$result = account($mail);
$id = id($mail);

?>
<!DOCTYPE html>
<html>
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img src="images/Logo-Header.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li <?php echo ($currentPage == 'Home') ? "class='nav-item active'" : "class='nav-item'"; ?> >
                            <a class="nav-link" href="index.php" name="index">Home</a>
                        </li>
                        <li <?php echo ($currentPage == 'Products') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="product.php" name="product">Products</a>
                        </li>
                        <li <?php echo ($currentPage == 'About') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="about.php" name="about">About</a>
                        </li>
                        <li <?php echo ($currentPage == 'Contact') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                           <a class="nav-link" href="contact.php" name="contact">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="cart.php" name="cart">
                              <img width="25" <?php echo ($currentPage == 'Cart') ? "src='images/cart-active.svg'" : "src='images/cart.svg'"; ?> alt="#" />
                           </a>
                        </li>
                        <?php if(mysqli_num_rows($result) === 1):?>
                        <?php echo '<li class="nav-item">
                           <a class="nav-link" href="account.php" name="account">
                              <img width="35" src="images/user.png" alt="#" />
                              <text style="margin: auto 10px;">'.name($mail).'</text>
                           </a> 
                        </li>';?>
                        <?php else:?>
                           <?php echo '<li class="nav-item" name="login">
                           <a class="nav-link" href="signin.php">
                              LOGIN
                           </a> 
                        </li>';?>
                        <?php endif;?>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
</html>
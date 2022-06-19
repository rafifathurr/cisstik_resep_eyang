<?php 

if(!isset($_SESSION["signin"])){
    header("Location: signin.php");
    exit;
}
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
               </nav>
            </div>
         </header>
</html>
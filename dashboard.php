
<?php 
include('partials/dashboard_header.php');
?>
    <!-- navbar -->
   <?php 
include('navbar.php');
?>
<!-- sidebar -->
<div class="container-fluid fixed-top mb-3">
    <div class="row">
    
    <?php
    include('partials/crud.php');
    ?>
    <!-- cards -->
   
    <?php
    include('partials/cards.php');
    ?>
    </div>

           
 

    <?php 
include('partials/dashboard_footer.php');



?>



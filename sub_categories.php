<?php
	include("includes/core.php");
	?>
  <?php
	include("partials/header.php");
	?>

  <div class="fixed-top">
    <!-- Promotions -->
    <?php
    include('promotions.php');
    ?>

    <!-- Navbar -->
    <?php
    include('navbar.php');
    ?>
  </div>
<!-- categories -->
<?php
 $categories = new Category();
?>
  <div id="subControls" class="carousel-slide-content-sub mx-auto">
  <h6 class="text-center mt-5">Our Categories</h6>
    <div class="carousel-inner-content-sub">
      <div class="carousel-item-content-sub active">
        <div class="row mt-5">
        <?php
      
     foreach ($categories->all() as $category):
    ?>
    <div class="col-md-2 mt-5 g-4 ">
  <div class="card-content">
    <div class="image-wrapper">
      <img src="images/<?php echo $category->image;?>" alt="dp">
    </div>
    <div class="caption">
      <h6><?php echo $category->name ?></h6>
      <h5><?php echo $category->description ?></h5>
    </div>
  </div>
  </div>
<?php
  endforeach;
?>


         
       
        </div>
      </div>
    </div>
  </div>
  <?php
  include('footer.php');

  ?>

  
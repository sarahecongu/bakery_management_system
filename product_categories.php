<?php
	include("includes/core.php");
$categories = new Category();

?>
<h4 class="text-center mt-5">Our <span class="text-warning font-weight-bold">Categories</span></h4>
  <div id="subControls" class="carousel-slide-content-sub mx-auto">
    <div class="carousel-inner-content-sub">
      <div class="carousel-item-content-sub active">
        <div class="row">
        <?php
      
     foreach ($categories->limit(6) as $category):
    ?>
    <div class="col-md-2 mt-5 g-4 ">
  <div class="card-content">
    <div class="image-wrapper">
      <img src="images/<?php echo $category->image;?>" alt="dp">
    </div>
    <div class="caption">
      <h6><?php echo $category->name ?></h6>
      
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
   <!-- view more -->
   <div class="viewer">
  <a href="sub_categories.php">View More</a>
   </div>

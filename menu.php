<?php
include("includes/core.php");
?>
<?php
$products = new Product();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>

<style>
    .product h4{
        text-align: center;
    }
</style>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="space"></div>
<section class="product" id="product">
<h4 class="title">Our<span>Products</span></h4>
<div class="box-container">
<?php
     foreach ($products->all() as $product):
    ?>
<div class="box">
  <div class="img">
  <img src="images/<?php echo $product->image;?>" alt="">
   <!-- <a class="bd-cake-tag" href="#"><?php echo $product->category_id?></a> -->
  </div>
  <div class="content">
    <h3><?php echo $product->name?></h3>
    <a href="details.php" class="btn1">Calories</a>
    <a href="details.php" class="btn1">Ingredients</a>
     <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="far fa-star"></i>
    </div>
    <span class="price">shs <?php echo $product->price; ?></span>
    <a href="" class="btn">Add to Cart</a>
  </div>
 
</div>
<?php
  endforeach;
?>
   

</div>
</section>
<?php 
include 'footer.php';
?>
<script src="main.js"></script>
</body>
</html>
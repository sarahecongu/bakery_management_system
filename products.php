<?php
include("includes/core.php");
?>
<?php
$products = new Product();

?>
<section class="product">
    <h4 class="title">Our<span>Products</span><a href="menu.php">View All >>></a></h4>
    <div class="box-container">
        <?php
     foreach ($products->limit(3) as $product):
    ?>

<div class="box">
  <div class="img">
  <a href="details.php"><img src="images/<?php echo $product->image;?>" alt="dp"></a>
  <!-- <a class="bd-cake-tag" href="#"><?php echo $product->category_id?></a> -->
  </div>
  <div class="content">
    <h3><?php echo $product->name?></h3>  
    <span class="price">shs <?php echo $product->price; ?></span>
    <button class="add" data-id="<?php echo $product->id; ?>">Add to Cart</button>

  </div>
  
</div>
     
<?php
  endforeach;
?>
     </div>
  </section>

  
<script src="main.js"></script>
         
       

    



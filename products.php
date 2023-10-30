<section class="product" id="product">
<h4 class="title">Our<span>Products</span><a href="menu.php">View All >>></a></h4>

<div class="box-container">
<?php 
        for ($i = 0; $i < 3; $i++) { 
            echo '
<div class="box">
  <div class="img">
  <img src="images/ice-cream.png" alt="">
  <a class="bd-cake-tag" href="#">bd cake</a>
  </div>
  <div class="content">
    <h3>Chocolate brown</h3>  
    <span class="price">shs 200,000</span>
    <a href="" class="btn">Add to Cart</a>
  </div>
  
</div>

';}
?>
</div>
</section>

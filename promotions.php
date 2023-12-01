<?php
$promotions= new Promotion();
$products= new Product();

?>
<style>
    .spae{
      min-height: 5vh;
    }
    .titles{
      text-align: center;
      font-size: 2.5rem;
      font-weight: bold;
    }
    span{
      color: rgb(79, 6,6);
    }
    .heading {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
    
    }
  </style>
<div class="spae"></div>
<div class="heading"><span class="titles">Our  Weekly Offers</span></div>
<section class="banner-container">
<?php foreach ($promotions->limit(3) as $promotion): 
 $promotions_details = $products->getParentAttributesFromChild('promotions', 'products', $promotion->id, 'product_id');
  ?>
    <div class="banner">
  
      <img src="<?php echo $promotions_details->image; ?>" alt="<?php echo $promotions_details->name; ?>">
      <div class="content">
        <span><?php echo $promotion->description; ?></span>

        <h3>
        <?php echo $promotions_details->name; ?>
        </h3>
  
        <span>shs <?php echo $promotions_details->price; ?></span>
        <a href="details.php" class="btn">Buy Now</a>
      </div>
    </div>
    <?php endforeach; ?>
</section>
<div class="heading">
  </div>
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

  <?php 
    
        for ($i = 0; $i < 3; $i++) { 
            echo '
    <div class="banner">
      <img src="images/bd.jpg" alt="">
      <div class="content">
        <span>Limited Sales</span>

        <h3>
      chcolate
        </h3>
  
        <span>shs 120,000</span>
        <a href="" class="btn">Buy Now</a>
      </div>
    </div>
  ';
}
?>
</section>
<div class="heading">
  
  </div>
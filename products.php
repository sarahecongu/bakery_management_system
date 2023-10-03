

<section class="products">
  <h4 class="text-center mt-4">Our <span>Products</span></h4>
  <div class="product">
    <div class="wrapper">
      <?php
      for ($i = 0; $i < 5; $i++) {
        echo '
        <div class="product box">
                <img src="images/bd.jpg" alt="...">
                <h3>chocolate cake</h3>
                <h6 class="price">shs 4500</h6>
                <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="" class="btn btn-dark">Add to Cart</a>
              </div>
        ';
      }

      ?>

  </div>

  </div>
  <div  class="view">
  <a href="">View More</a>
</div>
</section>
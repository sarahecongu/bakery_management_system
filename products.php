<!-- <div class="product-container"> -->
    <h4 class="product-title text-center mt-5">Our <span class="product-highlight">Products</span></h4>

    <div class="product-list row row-cols-2 row-cols-md-5 g-4 mt-4 mx-auto">
        <?php 
        for ($i = 0; $i < 5; $i++) { 
            echo '
            <div class="col mx-auto">
                <div class="product-card text-center">
                    <img src="./images/bans.jpg" class="product-image" alt="Chocolate Cake">
                    <h5 class="product-name">Chocolate Cake</h5>
                    <div class="product-price-cart  text-center">
                    <span class="product-price"> 150,000 </span>
                    <a href="#" class="text-secondary">
                        <i class="fa fa-shopping-cart btn btn-dark" aria-hidden="true"></i>
                    </a>
                </div>
                    <div class="product-details text-center">
                        <a href="#" class="calories-link">Calories</a>
                        <a href="#" class="ingredients-link">Ingredients</a>
                      
                        <div class="product-stars text-warning">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>

    <!-- View more -->
    <div class="view">
        <a href="bans_menu.php">View More</a>
    </div>
<!-- </div> -->

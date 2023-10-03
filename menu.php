<?php

include("search.php");
?>

<div class="container-box m-4">
    <h4 class="text-center mt-4">Our Cake Products</h4>
        <div class="row row-cols-1 row-cols-md-5 g-4 mt-2">
            <?php 
            for ($i = 0; $i < 50; $i++) { 
                echo '
                <div class="col">
                    <div class="card text-center">
                        <img src="./images/CAKE2.jpg" class="card-img-top mx-auto" alt="...">
                        <h5 class="card-title">Chocolate Cake</h5>
                        <p class="card-text">UGX 150,000</p>
                        <div class="card-body text-center mt-0">

                            <div class="stars text-warning ">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                                </div>
                            <a href="" class="btn btn-dark text-white mt-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
                            
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>





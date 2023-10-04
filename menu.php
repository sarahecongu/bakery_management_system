<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/styles.css">
    <title>menu</title>
</head>
<body>
    
</body>
</html>
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





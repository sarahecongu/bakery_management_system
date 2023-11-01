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
  <link rel="stylesheet" href="./css/index.css">

  <style>
        .menu-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            margin-top: 150px; 
        }

        .menu-button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }
    </style>

    <title>Bans menu</title>
</head>
<body>
<div class="fixed-top">
    <!--Promotions-->
    <?php
    include('promotions.php');
    ?>

     <!-- navbar -->
    <?php
    include('navbar.php');
     ?>
     <!-- navbar -->
  
</div>
<div class="menu-buttons">
    <a href="#" class="menu-button">Bans</a>
    <a href="#" class="menu-button">Pizza</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <a href="#" class="menu-button">Milk</a>
    <!-- <a href="#" class="menu-button">Milk</a> -->


</div>
<h4 class="product-title text-center">Our <span class="product-highlight">Menu</span></h4>

    <div class="product-list row row-cols-2 row-cols-md-5 g-4  mx-auto">
        <?php 
        for ($i = 0; $i < 15; $i++) { 
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

    
   <?php
  include('footer.php');

  ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>
</html>

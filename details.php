<?php
include("includes/core.php");

$products = new Product;
$product = $products->find($_GET['id']);
$health_benefits = new HealthBenefit;

$recipe = $products->getRecipy($_GET['id']);
$health_details = $health_benefits->getParentAttributesFromChild('products', 'health_benefits', $_GET['id'], 'health_benefit_id');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
  <style>
    .container {
      width: 100%;
      margin: 0 auto;
      overflow: hidden;
    }

    main {
      padding: 40px 0;
    }

    .product-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-right: 10px;

    }

    #product-image {
      margin-top: 15px;
      flex: 1;
      width: 100%;
      margin-bottom: 1rem;
      margin-left: -10px;
      margin-right: 70px;
      /* Add margin to the right */
    }

    #product-image img {
      width: 100%;
      height: 80%;
      border-radius: 1rem;
    }

    .product-description {
      margin-top: 15px;
      flex: 1;
      width: 100%;

    }

    .product-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .product-price {
      font-size: 20px;
      color: #e8491d;
      margin-bottom: 15px;
    }

    .product-summary {
      margin-bottom: 20px;
    }

    .quantity-selector {
      display: flex;
      align-items: center;
    }

    .quantity-btn {
      background-color: wheat;
      box-shadow: 0 0.5rem 1rem rgba(134, 44, 44, 0.1);
      color: #000;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;

    }

    .quantity-input {
      width: 40px;
      text-align: center;
      margin: 0 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      padding: 5px;
    }

    .additional-details {
      width: 100%;
      display: flex;
    }

    .details-column {
      width: 30%;
      margin-right: 2rem;
      /* margin-bottom: 2rem; */
    }

    .details-column h3 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .details-column p {
      margin-bottom: 15px;
    }


    .come {
      min-height: 15vh;
    }
  </style>
</head>

<body>
  <?php
  include("navbar.php");
  ?>
  <div class="come"></div>

  <main>
    <div class="container">
      <div class="product-details">
        <div id="product-image">
          <img src="<?php echo $product->image ?>" alt="Product Image">
        </div>
        <div class="product-description">
          <h2 class="product-title">
            <?php echo $product->name ?>
          </h2>
          <p class="product-price">Ugx.
            <?php echo Helper::formatNumber($product->price) ?>
          </p>
          <!-- <p class="product-summary">
          <?php
          // foreach($health_benefits as $benefit){
          echo $health_details->name;
          // }
          ?>
          </p> -->
          <div class="quantity-selector">
            <button class="quantity-btn" onclick="decrementQuantity()">-</button>
            <input type="text" class="quantity-input" id="quantity" value="1" readonly>
            <button class="quantity-btn" onclick="incrementQuantity()">+</button>
          </div>
          <a href="#" class="btn">Add to Cart</a>
          <div class="d-flex justify-content-between gap-4 mt-4">
            <div class="">
              <h3 class="fw-bold"> Ingredients</h3>
              <p>
                <?php
                foreach ($recipe as $recip) {
                  echo $recip->description;
                }
                ?>
              </p>
              <!-- Add more ingredients as needed -->
            </div>
            <div class="">
              <h3 class="fw-bold">Recipes</h3>
              <?php foreach ($recipe as $recip) {
                echo $recip->instructions;
              } ?>
              <!-- Add more recipe steps as needed -->
            </div>
          </div>
        </div>
        <!-- Additional details row -->
      </div>
    </div>
  </main>
</body>

</html>
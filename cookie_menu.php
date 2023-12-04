<?php
include("includes/core.php");
?>
<?php
$products = new Product();

$api = new Api();
// $api->all();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
</head>
<body>
  <?php
  include("navbar.php");
  ?>
   <?php
  include("menu_buttons.php");
  ?>
  <section class="product" id="product">
    <h4 class="titles">Our Products</h4>
    <div class="box-container">
      <?php
      $count = 0;

      foreach ($products->all() as $product):
        // if ($count <=6) {
        ?>
        <div class="box">
          <div class="img">
            <img src="<?php echo $product->image ?>" alt="">
            <!-- <a class="bd-cake-tag" href="#"><?php echo $product->category_id ?></a> -->
          </div>
          <div class="content">
            <h3>
              <?php echo $product->name ?>
            </h3>
            <a href="details.php" class="btn1">Calories</a>
            <a href="details.php" class="btn1">Ingredients</a>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <span class="price">shs 270,000</span>
            <button class="add_cart" data-id="">Add to Cart</button>
          </div>

        </div>
        <?php
        // }
        $count++;
      endforeach;
      ?>


    </div>
  </section>
  <?php
  include 'footer.php';
  ?>
  <script src="main.js"></script>
</body>

</html>
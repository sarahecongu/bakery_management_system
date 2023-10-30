
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>Home Page</title>
</head>
<body>

  <div>
    <!-- navbar -->
    <?php
    include('navbar.php');
    ?>
  </div>

  <!-- heroes -->
  <?php
  include('hero.php');
  ?>
  <!-- Our Features -->
  <?php
  include('promotions.php');
  ?>
  <!--categories  -->
  <?php
  include('product_categories.php');
  ?>
  <!--products  -->
  <?php
  include('products.php');

  ?>
    <!--news  -->
    <?php
  include('features.php');

  ?>

   <?php
  include('footer.php');

  ?>

</body>

</html> 
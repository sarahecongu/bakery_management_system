<?php
require_once('./config/dbh.php');
require_once('./includes/classes_autoload.inc.php');
// $dbobj = new Database();
// print_r($dbobj);
?>
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


  <title>Home Page</title>
</head>

<body>

  <div class=fixed-top>
    <!--Promotions-->
    <?php
    include('promotions.php');
    ?>

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
  include('features.php');
  ?>
  <!--categories  -->
  <?php
  include('categories.php');
  ?>
  <!--products  -->
  <?php
  include('products.php');

  ?>

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
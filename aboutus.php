<?php require_once('includes/core.php');
$about_us = new AboutUs;
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
  <title>About Us Page</title>
  <style>
    .spac{
        min-height: 15vh;
    }
    p{
        font-size: 2.5rem;
        padding-top: 1.5rem;
    }
  </style>
</head>
<body>
    <?php
    include("navbar.php");
    ?>
  <div class="spac"></div>

<?php 
$about_us_data = $about_us->all();
$firstAboutUs = reset($about_us_data); 
?>

<section class="aboutus">
    <img src="images/<?php echo $firstAboutUs->image; ?>" alt="Bake Pal Team" class="w-100">
    <div>
        <h1><?php echo $firstAboutUs->title; ?></h1>
        <p><?php echo $firstAboutUs->description; ?></p>
    </div>
</section>

<!-- <section class="company-info">
    <?php foreach (array_slice($about_us_data, 1) as $aboutus): ?>
        <div class="info-box">
            <h2><?php 
            // echo $aboutus->title; 
            ?></h2>
            <div class="image"  class="w-100">
                <img src="images/<?php 
                // echo $aboutus->image; 
                ?>" alt="Customers Image">
                <h2 id="branches-count"><?php
                //  echo $aboutus->total;
                  ?></h2>
            </div>
            <p><?php
            //  echo $aboutus->description;
              ?></p>
        </div>
    <?php endforeach; ?>
</section> -->

<?php include("footer.php"); ?>

<script src="main.js"></script>
</body>

</html>

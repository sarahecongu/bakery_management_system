<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
  <style>
    span{
        color: orangered;
    }
  </style>
<body>
<?php
    include("navbar.php");
    ?>
    <div class="space"></div>


    <main>
        <section class="recipe-image">
            <img src="images/pizza-hut.jpg" alt="Delicious Recipe">
        </section>

        <section class="recipe-links">
            <h2>The <span>Pizza Recipe</span</h2>
            <ul>
                <li><a href="#recipes">Calories</a></li>
                <li><a href="#ingredients">Ingredients</a></li>
                <li><a href="#instructions">Instructions</a></li>
                <li><a href="#instructions">Equipment</a></li>

            </ul>
        </section>



</body>
</html>

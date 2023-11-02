<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>About Us Page</title>
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <section class="aboutus">
    <img src="https://www.escoffier.edu/wp-content/uploads/2022/04/Smiling-female-chef-in-a-bakery-with-loaves-of-bread-1400.jpg" alt="Bake Pal Team">
    <div>
        <h1>About Us</h1>
        <p>Welcome to Bake Pal! We are a team of passionate bakers dedicated to creating delicious pastries, cakes, and more.</p>
        <p>Our journey began in a small kitchen, and now we serve our delightful treats to customers all over the city.</p>
        <p>With quality ingredients and a sprinkle of love, we're committed to making every bite a delightful experience.</p>
    </div>
</section>

    <section class="company-info">
    <!-- <div class="info-box">
        <h2>Profits</h2>
        <p>Our dedication to quality and customer satisfaction has led to consistent growth and profitability.</p>
        <img src="profits_image.jpg" alt="Profits Image">
        <p>Working Hours: Monday-Friday, 9:00 AM - 6:00 PM</p>
    </div> -->
    <div class="info-box">
        <h2>Customers</h2>
        <div class="image">
        <img src="https://static.vecteezy.com/system/resources/previews/000/550/535/non_2x/user-icon-vector.jpg" alt="Customers Image">
        <h2 id="branches-count">10,000</h2>
        </div>
        <p>We're proud to have served thousands of happy customers, and we look forward to serving even more.</p>
    </div>
    <div class="info-box">
   
        <h2>Branches</h2>
        <div class="image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsdFAYgINZHnkNiW-hKSG5igOGgkYdqY7nFg&usqp=CAU" alt="Branches Image">
        <h2 id="branches-count">10,000</h2>
        </div>
        <p>With multiple locations across the city, we're easily accessible to our customers no matter where they are.</p>
       
    </div>
    <div class="info-box">
        <h2>Workers</h2>
        <div class="image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoWfNapfc39EvWQV6sdZPSPcpvUwfs9JnmMw&usqp=CAU" alt="Workers Image">
        <h2 id="branches-count">10,000</h2>
        </div>
        <p>Our dedicated team of skilled bakers and staff work tirelessly to bring you the best baked goods in town.</p>
    </div>
</section>

<?php
    include("footer.php");
    ?>

<script src="main.js"></script>







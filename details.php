<?php
include("includes/core.php");
?>
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
    span {
      color: orangered;
    }

    .spaced {
      min-height: 25vh;
    }

    .container {
      max-width: 75%;
      margin: auto;
      height: 80vh;
      margin-top: 5%;
      background: white;
      /* box-shadow: 5px 5px 5 px 5px rgba(0, 0, 0, 0.1); */
      display: flex;
    }

    .left,
    .right {
      width: 80%;
      padding: 30px;
    }

    .flex {
      display: flex;
      /* justify-content: space-between; */
    }

    .flex1 {
      display: flex;
      align-items: center;
    }
    .main_image{
      display: flex;
      justify-content: center;
    }
    .main_image img {
      width: 60%;
    

    }

    .option img {
      width: 55px;
      height: 55px;
      padding: 10px;
      cursor: pointer;
    }

    .right {
      padding: 50px;
    }

    h3 {
      color: #af827d;
      margin: 20px 0;
      font-size: 25px;
    }

    h2,
    h4 {
      margin: 10px 0;
    }

    p {
      font-size: 16px;
      color: #555;
    }

    h6 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .add span {
      font-size: 20px;
      margin: 0 10px;
      cursor: pointer;
    }

    .btn {
      background-color: #ff6600;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }

    .btn:hover {
      background-color: #e55300;
    }
  </style>
</head>

<body>
  <?php
  include("navbar.php");
  ?>
  <div class="spaced"></div>

  <div class="container">
    <div class="left">
      <div class="main_image">
        <img src="images/chris.jpg" alt="">
      </div>
      <div class="option flex">

      </div>
    </div>
    <div class="right">
      <h2>ChristMas Cake</h2>
      <h4><small>shs</small>230,000</h4>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo rerum dolor recusandae optio est architecto
        quibusdam distinctio consequuntur libero incidunt eveniet reprehenderit impedit ut qui deserunt repellat
        molestias, nisi atque!</p>
      <h6>Quantity</h6>
      <div class="add flex1">
        <span onclick="updateQuantity(-1)">-</span>
        <span id="quantity">1</span>
        <span onclick="updateQuantity(1)">+</span>
      </div>
      <button class="btn" onclick="addToCart()">Add To Cart</button>
    </div>
  </div>

  <script>
    function img(anything) {
      document.querySelector('.main_image img').src = anything;
    }

    let quantity = 1; // Initial quantity

    function updateQuantity(value) {
      quantity += value;
      if (quantity < 1) {
        quantity = 1;
      }
      document.getElementById('quantity').innerText = quantity;
    }

    function addToCart() {
      // You can add your addToCart logic here
      alert(`Product added to cart. Quantity: ${quantity}`);
    }
  </script>
</body>

</html>

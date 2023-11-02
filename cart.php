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
   <div class="cart-container">
        <section class="cart-items">
            <h2>Your Cart</h2>
            <h2>0 Items</h2>
            <ul>
                <li>
                    <img src="images/pizza-hut.jpg" alt="Product 1">
                    <div class="item-info">
                        <h3>Product 1</h3>
                        <p>Price: shs 1000</p>
                        <div class="quantity">
                            <span class="quantity-btn decrease">-</span>
                            <h6 class="quantity-value">1</h6>
                            <span class="quantity-btn increase">+</span>
                       
                        </div>
                        <h2 class="discount"><del>Discount: 20%</del></h2>
                        <button class="remove-item">Remove</button>
                          
                 
                    </div>
                </li>
                <!-- wooow -->
                <li>
                    <img src="images/pizza-hut.jpg" alt="Product 1">
                    <div class="item-info">
                        <h3>Product 1</h3>
                        <p>Price: shs 1000</p>
                        <div class="quantity">
                            <span class="quantity-btn decrease">-</span>
                            <h6 class="quantity-value">1</h6>
                            <span class="quantity-btn increase">+</span>
                           
                        </div>
                        <button class="remove-item">Remove</button>
                       
                    </div>
                </li>
              
         
            </ul>
        </section>

        <section class="cart-summary">
            <h2>Summary</h2>
            <p>Total Items: <span id="total-items">1</span></p>
            <p>Total Price: <span id="total-price">shs 10.00</span></p>
            <button class="btn">Checkout</button>
        </section>
        </div>
</body>
</html>

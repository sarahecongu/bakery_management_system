<!DOCTYPE html>
<?php
include('includes/core.php');
?>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Checkout Success</title>
    <style>
        .spa {
            min-height: 25vh;
        }

        .success-message {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .order-details {
            /* border: 1px solid #ddd; */
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
        }

        .order-details h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .order-details p {
            color: #555;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .thank-you-message {
            font-size: 18px;
            margin-top: 20px;
             text-align: center;
        }

        .home-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 1.5rem;
         text-align: center;
        }
        .home-link-container {
            text-align: center;
        }
        .view-order-details-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: Red;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        font-size: 1.5rem;
        transition: background-color 0.3s ease;
    }

    .view-order-details-button:hover {
        background-color: #2980b9;
    }
   
        @media only screen and (max-width: 600px) {
            .spa {
            min-height: 25vh;
        }
        .view-order-details-button {
            font-size: 1.2rem;
        }

        .order-details {
            padding: 10px;
            max-width: 100%;
            margin: auto;
            text-align: center;
        }

        .order-details h2 {
            font-size: 24px;
           
        }

        .order-details p {
            font-size: 14px;
        }

        .thank-you-message {
            font-size: 16px;
        }

        .home-link {
            font-size: 1.2rem;
        }
    }
    </style>
</head>
<body style="background:wheat">
    <?php include("navbar.php"); ?>
    <div class="spa"></div>
    <section class="container-success">

    <div class="order-details">
        <h2>Your Order Details</h2>
        <p>Order Number: <span id="order-number">123456</span></p>
        <p>Date: <span id="order-date">November 27, 2023</span></p>
        <p>Total Amount: $<span id="order-total">50.00</span></p>
    </div>

    <div class="thank-you-message">
        <p>Thank you for your purchase!</p>
        <p>Your order has been successfully processed.</p>
    </div>

    <div class="home-link-container">
        <a href="menu.php" class="home-link">Continue Shopping</a>
        <a href="cancel.php" class="view-order-details-button">Cancel</a>
        
    </div>
</section>
</body>
</html>

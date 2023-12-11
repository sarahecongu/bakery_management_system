<!DOCTYPE html>
<?php
require_once('includes/core.php');
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
        body {
            background: wheat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .success-message {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
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

        .home-link, .view-order-details-button {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 1.5rem;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .home-link {
            background-color: #4CAF50;
            color: white;
        }

        .view-order-details-button {
            background-color: #3498db;
            color: #fff;
        }

        .home-link:hover, .view-order-details-button:hover {
            background-color: #2980b9;
        }

        @media only screen and (max-width: 600px) {
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

            .home-link, .view-order-details-button {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="success-message"><i class="fas fa-check-circle"></i> Payment Successful! </div>
    <section class="container-success">

    <div class="thank-you-message">
        <p>Thank you for your purchase!</p>
        <p>Your order has been successfully processed.</p>
    </div>

    <div class="home-link-container">
        <a href="menu.php" class="home-link">Continue Shopping</a>
        <a href="view_orders.php" class="view-order-details-button">View Orders</a>
    </div>
</section>
</body>
</html>

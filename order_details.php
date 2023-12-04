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

        th {
            background-color: rgb(76, 9, 9);
            color: white;
            font-size: 15px;
        }

        .success-message {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .order-details table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            /* overflow-x: auto; */
            margin: 5px 0;
        }

        .order-details th,
        .order-details td {
            padding: 12px;
            text-align: center;
            font-size: 12px;
            border: 1px solid gray;
        }

        .order-details th {
            background-color: rgb(76, 9, 9);
            color: white;
            font-size: 12px;
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

            .order-details th,
            .order-details td {
                font-size: 10px;
            }

            .view-order-details-button {
                font-size: 1rem;
            }

            .order-details {
                padding: 10px;
                max-width: 100%;
                margin: auto;
                text-align: center;
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
   

        <div class="order-details">
            <h2>Your Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Order Number</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                        <th>Address</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>November 27, 2023</td>
                        <td>$50.00</td>
                        <td>123456</td>
                        <td>November 27, 2023</td>
                        <td>$50.00</td>
                        <td>123456</td>
                        <td>November 27, 2023</td>
                        <td>$50.00</td>
                        <td><a href="cancel.php" class="view-order-details-button">Cancel</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="thank-you-message">
            <p>Thank you for your purchase!</p>
            <p>Your order has been successfully processed.</p>
        </div>

        <div class="home-link-container">
            <a href="menu.php" class="home-link">Continue Shopping</a>
        </div>
    
        <?php
        include('footer.php');
        ?>
</body>

</html>

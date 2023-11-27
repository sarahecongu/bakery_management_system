<!DOCTYPE html>
<?php
include('includes/core.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Order Cancellation</title>
    <style>
        .spa {
            min-height: 25vh;
        }

        .cancel-message {
            color: #e74c3c;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .cancel-details {
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
        }

        .product-image {
            width: 30%;
            /* height: auto; */
            margin-top: 20px;
            border-radius: 10%;
            overflow: hidden;
        }

        .cancel-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
        }

        .cancel-form {
            max-width: 400px;
            margin: 20px auto;
            text-align: left;
        }


        .cancel-form select {
            flex: 1;
            width: calc(120% - 5px);
            padding: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            border-radius: 1rem;
        }

        .cancel-form button {
            /* flex: 1; */
            width: 50%;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.5rem;
        }

        @media only screen and (max-width: 600px) {
            .spa {
                min-height: 25vh;
            }

            .cancel-message {
                font-size: 20px;
            }

            .cancel-details {
                padding: 10px;
                max-width: 100%;
                margin: auto;
                text-align: center;
            }

            .product-image {
                max-width: 100%;
                height: auto;
                margin-top: 20px;
            }

            .cancel-form {
                max-width: 100%;
            }

            .cancel-form select {
                width: 100%;
            }

            .cancel-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body style="background:wheat">
    <?php include("navbar.php"); ?>
    <div class="spa"></div>
    <section class="container-cancel">

    <div class="cancel-message">Order Cancellation</div>

    <div class="cancel-details">
        <img class="product-image" src="images/11.jpg" alt="Product Image">
        <p>Product Details: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

    <div class="cancel-form">
        <form action="#" method="post">
            <label for="quantity">Quantity:</label>
            <select id="quantity" name="quantity" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <!-- Add more quantity options as needed -->
            </select>

            <label for="cancellation-reason">Reason for Cancellation:</label>
            <select id="cancellation-reason" name="cancellation-reason" required>
                <option value="defective">Defective Product</option>
                <option value="change-mind">Changed My Mind</option>
                <!-- Add more cancellation reasons as needed -->
            </select>

            <button type="submit">Submit </button>
        </form>
    </div>

</section>
</body>
</html>

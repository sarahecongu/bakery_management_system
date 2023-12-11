<!DOCTYPE html>
<?php
require_once('includes/core.php');
$order = new Order;
$order_items = new OrderItem;
$grandTotal = 0;

$order_details = $order->getRelated("order_items", $_GET['id'], 'order_id');
$order = $order->find($_GET['id']);

// var_dump($order_details);die;

?>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <title>Checkout Success</title>
    <style>
          .quantity {
        background-color: wheat;
        box-shadow: 0 0.5rem 1rem rgba(134, 44, 44, 0.1);
        color: #000;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 1rem;
    }
        #remove {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border-color: red;
            font-size: 1.4rem;
        }

        .spa {
            min-height: 25vh;
        }

        th {
            /* background-color: rgb(76, 9, 9); */
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
            /* border: 1px solid gray; */
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

    <div class="my-4">
        <h2 class='h2 fw-bold'>ORDER NO: #
            <?php echo $order->track_no ?>
        </h2>
    </div>


    <section class="order-details">

        <table class="cart">
            <!-- <h1>Your Shopping Cart</h1> -->
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>

            </tr>
            <?php

            foreach ($order_details as $order_detail) {
                $childTable = 'order_items';
                $parentTable = 'products';
                $foreignKey = 'product_id';
                $childId = $order_detail->id;

                $product = $order_items->getParentAttributesFromChild($childTable, $parentTable, $childId, $foreignKey);

                ?>
                <tr class="item">
                    <td>
                        <img src="<?php echo $product->image; ?>" style="width: 50px;" alt="<?php echo $product->name; ?>">
                    </td>
                    <td title="<?php echo $product->name; ?>">
                        <?php

                        echo substr($product->name, 0, 20);

                        if (strlen($product->name) > 20) {
                            echo '...';
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $product->price; ?>
                    </td>
                    <td>
                        <button class="quantity">
                            <?php echo $order_detail->quantity ?>
                        </button>
                    </td>
                    <td>
                        <?php echo $total = $product->quantity * $product->price; ?>
                    </td>

                </tr>
                <?php $grandTotal += $total;
            }
            ?>
        </table>
        <div class="total">
            <h2>Grand Total:
                <?php echo $grandTotal ?>
            </h2>
        </div>


    </section>

    <div class="home-link-container">
        <a href="menu.php" class="home-link">Continue Shopping</a>
        <form action="order_details.php" method="POST" class="d-inline-block">
            <button type="submit" id="remove" name="remove" value="<?php echo $order_details ?>"
                onclick="return confirm('Are you sure you want to Cancel Order?')">
                Cancel
            </button>
        </form>
    </div>


    <?php
    include('footer.php');
    ?>
</body>

</html>
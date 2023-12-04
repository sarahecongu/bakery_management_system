<?php
include('includes/core.php');
$carts = new Cart;
$cart_items = new CartItem;

// var_dump($_POST);die;
$grandTotal = $_POST['grand_total'] ?? $_SESSION['grand_total'];

if (isset($_SESSION['cart_token'])) {

    $carts->addToCart($cart_items);
}

if (isset($_POST['place_order'])) {
    $carts = new Cart;
    $cart_items = new CartItem;

    $orders = new Order;
    $order_items = new OrderItem;

  

    $cart_id = $carts->getUserCart($session->get('id'));

    $user_order = $orders->create(['user_id' => $session->get('id'), 'total_amount' => $grandTotal, 'track_no' => rand(111111111, 999999999)]);
    
    $order = $orders->getLatestOrder($session->get('id'));

    // var_dump($order);die;
    foreach ($cart_items->where(['cart_id' => $cart_id]) as $cart_item) {
        $order_items->create(['order_id' => $order->id, 'product_id' => $cart_item->product_id, 'quantity' => $cart_item->quantity]);
        $cart_items->delete($cart_item->id);
    }

    // TODO::Redirect to the order completed view, Display the Order number.

    header("Location: checkout_success.php");



    // var_dump($cart);
    // die;
}


?>
<!DOCTYPE html>
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
    <style>
        .spa {
            min-height: 25vh;
        }

        h2 {
            font-size: 2rem;
        }

        header {
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            gap: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-column {
            flex: 1;
        }

        .right-column {
            flex: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
            font-size: 1.5rem;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            color: rgb(79, 9, 9);
        }

        button {
            background-color: rgb(79, 9, 9);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            width: 200px;

        }
    </style>
    <title>Checkout Page</title>
</head>

<body style="background:wheat">
    <?php include("navbar.php"); ?>
    <div class="spa"></div>

    <div class="container">
        <div class="left-column">
            <form action="checkout.php" method="post">
                <!-- Collect user information -->
                <h2>Order Summary</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="tel">Phone No:</label>
                <input type="tel" id="tel" name="tel" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>

                <input type="hidden" name="grand_total" value="<?php echo $grandTotal ?>">

                <h2>Payment Information</h2>
                <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment-method" required>
                    <option value="mobile-money">50% Initial</option>
                    <option value="mobile-money">Mobile Money</option>
                    <option value="cash">Cash</option>
                </select>

                <button type="submit" name="place_order" class="btn">Place Order</button>
            </form>
             <!-- View Order Button -->
        
        </div>

        <div class="right-column">
            <h2>Order</h2>
            <!-- Display the selected items, quantities, and prices here -->
            <table class="cart">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                 
                </tr>
                <!-- Add your PHP code to populate table rows here -->
               
            </table>
            <a href="view_order.php" class="btn">View Order</a>
        </div>
    </div>

    <?php include('footer.php') ?>;
</body>

</html>
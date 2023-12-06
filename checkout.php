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
}

$cart = new Cart;
$cart_item = new CartItem;
$products = new Product;
$grandTotal = 0;
// $carts = 0;
try {
  $cart_items = $cart->getRelated('cart_items', $cart->getUserCart($session->get('id')), 'cart_id');
} catch (\Throwable $th) {
  $cart_items = [];
}

// <!-- delete function -->
if (isset($_POST['remove'])) {
  $cart_id = $_POST['remove'];

  if ($session->checkLoginStatus()) {
    // If the user is logged in, remove the cart item from the database
    $cart_item->delete($cart_id);
  } else {
    // If the user is not logged in, remove the cart item from the session
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $cart_id) {
          unset($_SESSION['cart'][$key]);
          break; // Stop iterating once the item is removed
        }
      }
    }
  }

  header("Location: cart.php");
  exit();
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
            font-weight: bold;
        }
        h4 {
            margin-top: 2rem;
            font-size: 1.5rem;
            font-weight: bold;
        }
        p{
            display: flex;
            font-size: 1.5rem; 
        }
        .container {
            /* margin: 20px auto; */
            display: flex;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .left-column {
            flex: 1;
        }
        .right-column {
            flex: 1;
            /* margin-left: 35px; */
        }
        form {
            display: grid;
            gap: 10px;
        }
        label {
           
            font-size: 1.5rem;
        }
        input,
        textarea,
        select {
            /* width: 100%; */
            padding: 15px;
            border-radius: 10px;
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
        img{
            border-radius: 10px;
        }
        .cart {
            width: 100%;
            border-collapse: collapse;
     

    }

    .cart td,
    .cart th {
      text-align: center;
      padding: 5px;
      font-size: 1.5rem;
      background-color: wheat;
    }
    .cart img {
      max-width: 100px;
      border-radius: 1rem;
    }
    .total {
      margin-top: 20px;
      text-align: right;
      font-size: 1.5rem;
    }
    .cart button {
      background-color: wheat;
      box-shadow: 0 0.5rem 1rem rgba(134, 44, 44, 0.1);
      color: #000;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 1rem;
    }
    .increment{
        width: 30%;
    }
    .decrement{
        width: 30%;
    }
    .quantity{
        width: 30%;
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
        </div>
<!-- cart -->
        <div class="right-column">
            <h2>Your Cart</h2>
  <div class="space"></div>
  <section class="shopping_cart">
    <table class="cart">
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
      <?php
      $cartItemCount = $session->checkLoginStatus() ? count($cart_items) : count($_SESSION['cart']);
      foreach ($cartItemCount > 0 ? $session->checkLoginStatus() ? $cart_items : $_SESSION['cart'] : [] as $key => $data) {
        $childTable = 'cart_items';
        $parentTable = 'products';
        $foreignKey = 'product_id';
        $childId = $session->checkLoginStatus() ? $data->id : $data['product_id'];
        if ($session->checkLoginStatus()) {
          $product = $cart_item->getParentAttributesFromChild($childTable, $parentTable, $childId, $foreignKey);
        } else {
          $product = $products->find($childId);
        }
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
            <button class="increment" data-id=''>+</button>
            <button class="quantity">
              <?php echo $session->checkLoginStatus() ? $data->quantity : $data['quantity']; ?>
            </button>
            <button class="decrement">-</button>
          </td>
          <td>
            <?php echo $total = $session->checkLoginStatus() ? $data->quantity  * $product->price: $data['quantity'] * $product->price; ?>
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
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const incrementButtons = document.querySelectorAll(".increment");
      const decrementButtons = document.querySelectorAll(".decrement");
      const quantityElements = document.querySelectorAll(".quantity");

      incrementButtons.forEach((button, index) => {

        $.ajax({
                url: "action.php",
                type: "post",
                data: {
                    add_to_cart: 1,
                    product_id: id,
                    product_name: name,
                    product_image: image,
                    product_price: price,
                    quantity: 10
                },
                success: function (response) {
                    // alert(response);
                    $(".cart-counter").text(response);
                    // Optionally, update a cart icon or counter
                }
            });

        button.addEventListener("click", function () {
          quantityElements[index].innerText = parseInt(quantityElements[index].innerText) + 1;
        });
      });

      decrementButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
          const currentQuantity = parseInt(quantityElements[index].innerText);
          if (currentQuantity > 1) {
            quantityElements[index].innerText = currentQuantity - 1;
          }
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      // Find the form and button elements
      var form = document.getElementById("checkoutForm");
      var checkoutButton = document.getElementById("checkoutButton");

      // Add a click event listener to the button
      checkoutButton.addEventListener("click", function () {
        // Submit the form
        form.submit();
      });
    });

    

  </script>




        </div>
    </div>

    <?php include('footer.php') ?>;
</body>

</html>
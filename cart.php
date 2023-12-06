<?php
include('includes/core.php');
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
  <style>
    .cart {
      width: 100%;
      /* margin: 0 auto; */
      border-collapse: collapse;
      margin-top: 5rem;

    }

    .cart td,
    .cart th {
      text-align: center;
      /* border: 1px solid #ccc; */
      padding: 10px;

      font-size: 1.5rem;
    }



    .cart img {
      max-width: 100px;
      border-radius: 1rem;
    }

    #remove {
      background-color: red;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
    }


    .total {
      margin-top: 20px;
      text-align: right;
      font-size: 1.5rem;
    }


    .continue-shopping-button,
    .checkout-button {
      display: inline-block;
      padding: 5px 10px;
      background-color: rgb(76, 9, 9);
      box-shadow: 0 0.5rem 1rem rgba(134, 44, 44, 0.1);
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
      margin-bottom: 2rem;


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

    .buttons {
      margin: 2px;
    }

    .shopping_cart {
      background: wheat;
    }

    .space {
      min-height: 15vh;
    }



    @media screen and (max-width: 768px) {
      .cart {
        font-size: 14px;
      }

      .cart td,
      .cart th {
        padding: 8px;
      }

      .cart img {
        max-width: 30px;
      }

      .total h2 {
        font-size: 1.2rem;
      }

      .buttons {
        margin: 5px;
      }

      .continue-shopping-button,
      .checkout-button {
        font-size: 14px;
      }

      #remove {
        padding: 8px 12px;
      }
    }

    @media screen and (max-width: 600px) {
      /* Additional styles for screens with maximum width of 600px */
    }

    /* Add more media queries as needed */
  </style>
</head>

<body>
  <?php
  include("navbar.php");

  ?>

  <div class="space"></div>
  
  <section class="shopping_cart">

    <table class="cart">
      <!-- <h1>Your Shopping Cart</h1> -->
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Actions</th>
      </tr>
      <?php
 if(isset($_SESSION['cart']) || $session->checkLoginStatus())
      $cartItemCount = $session->checkLoginStatus() ? count($cart_items) : count($_SESSION['cart']);
     else
     $cartItemCount = 0;
      
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
          <td>
            <form action="cart.php" method="POST" class="d-inline-block">
              <button type="submit" id="remove" name="remove"
                value="<?php echo $session->checkLoginStatus() ? $data->id : $data['product_id']; ?>"
                onclick="return confirm('Are you sure you want to delete cart item?')">
                remove
              </button>
            </form>
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

    <div class="buttons">
      <a href="menu.php" class="continue-shopping-button">Continue Shopping</a>
      <?php if ($session->checkLoginStatus()): ?>
        <form id="checkoutForm" action="checkout.php" method="POST">
          <input type="hidden" name="grand_total" value="<?php echo $grandTotal ?>">
          <button type="button" id="checkoutButton" class="checkout-button">Checkout</button>
        </form>
      <?php else: ?>
        <form action="login.php" method='post'>
          <input type="hidden" name="cart_token" value="<?php echo rand(111111, 999999) ?>">
          <input type="hidden" name="grand_total" value="<?php echo $grandTotal ?>">
          <button type="submit" id="checkoutButton" class="checkout-button">Checkout</button>
        </form>
      <?php endif ?>


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


</body>

</html>
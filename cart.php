<?php
include('includes/core.php');
$cart =  new Cart;
$cart_item = new CartItem;
$grandTotal = 0;
try {
$cart_items  = $cart->getRelated('cart_items', $cart->getUserCart($session->get('id')), 'cart_id');

} catch (\Throwable $th) {
  $cart_items = [];
}
?>

<!-- delete function -->
<?php
if (isset($_POST['remove'])) {

  $cart_id = $_POST['remove'];
  $cart_item->delete($cart_id);
  header("Location: cart.php");
  exit();
}
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

.cart {
    width: 100%;
    /* margin: 0 auto; */
    border-collapse: collapse;
    margin-top: 5rem;
   
}

.cart td, .cart th {
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
    background-color: rgb(76,9,9);
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

.buttons{
    margin: 2px;
}
.shopping_cart{
    background: wheat;
}
.space{
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
    <h1>Your Shopping Cart</h1>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Actions</th>
      </tr>

      <?php
$cartItemCount = count($cart_items);

for ($i = $cartItemCount - 1; $i >= 0; $i--) {
    $data = $cart_items[$i];

    $childTable = 'cart_items';
    $parentTable = 'products';
    $foreignKey = 'product_id';
    $childId = $data->id;

    $product = $cart_item->getParentAttributesFromChild($childTable, $parentTable, $childId, $foreignKey);
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
        <td><?php echo $product->price; ?></td>
        <td>
            <button class="increment">+</button>
            <button class="quantity"><?php echo $data->quantity ?></button>
            <button class="decrement">-</button>
        </td>
        <td><?php echo $total = $data->quantity * $product->price; ?></td>
        <td>
            <form action="cart.php" method="POST" class="d-inline-block">
                <button type="submit" id="remove" name="remove" value="<?php echo $data->id; ?>"
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
      <h2>Grand Total:<?php echo $grandTotal ?> </h2>
    </div>
    <div class="buttons">
      <a href="menu.php" class="continue-shopping-button">Continue Shopping</a>
     <form id="checkoutForm" action="checkout.php" method="POST">
    <input type="hidden" name="grand_total" value="<?php echo $grandTotal ?>">
    <button type="button" id="checkoutButton" class="checkout-button">Checkout</button>
</form>

    </div>
  </section>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const incrementButtons = document.querySelectorAll(".increment");
    const decrementButtons = document.querySelectorAll(".decrement");
    const quantityElements = document.querySelectorAll(".quantity");

    incrementButtons.forEach((button, index) => {
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

  document.addEventListener("DOMContentLoaded", function() {
    // Find the form and button elements
    var form = document.getElementById("checkoutForm");
    var checkoutButton = document.getElementById("checkoutButton");

    // Add a click event listener to the button
    checkoutButton.addEventListener("click", function() {
        // Submit the form
        form.submit();
    });
});

</script>


</body>

</html>

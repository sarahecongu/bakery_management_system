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

<head>
<style>

.cart {
    width: 80%;
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
    max-width: 80px;
    border-radius: 1rem;
}

.remove {
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
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    border-radius: 5px;
    margin-bottom: 2rem;
    
    
}
.cart button {
    background-color: rgb(76,9,9);
    color: #fff; 
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

      <?php foreach ($cart_items as $data) : ?>
        <?php

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
          <td  title="<?php echo $product->name; ?>">
          
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
          <td><?php echo $total =  $data->quantity * $product->price;
          ?></td>
          <td>
          <form action="cart.php" method="POST" class="d-inline-block">
              <button type="submit" class = "remove" name="remove" value="<?php echo $data->id;?>"
                onclick="return confirm('Are you sure you want to delete cart item?')">
                remove
              </button>
            </form>
          </td>
        </tr>
        <?php $grandTotal += $total; 
       endforeach; ?>

    </table>
    <div class="total">
      <h2>Grand Total:<?php echo $grandTotal ?> </h2>
    </div>
    <div class="buttons">
      <a href="index.html" class="continue-shopping-button">Continue Shopping</a>
      <a href="checkout.html" class="checkout-button">Checkout</a>
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
</script>


</body>

</html>

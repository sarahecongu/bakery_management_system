<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="./css/styles.css"> -->
  <!-- <link rel="stylesheet" href="./css/index.css"> -->

<title>Shopping Cart</title>
    
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 20px;
}

h1 {
  text-align: center;
}

.cart-item {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  max-width: 500px;
  height: 200px;
}

.cart-item img {
  max-width: 100px;
  margin-right: 10px;
}

.cart-item h3 {
  margin-bottom: 30px;
}

.cart-item p {
  margin: 0;
}

.remove-button {
  background-color: #ff5c5c;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

.remove-button:hover {
  background-color: #ff1f1f;
}

.cart-total {
  text-align: right;
  margin-top: 20px;
}

.checkout-button {
  background-color: #4caf50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

.checkout-button:hover {
  background-color: #45a049;
}

</style>


</head>
<body>

  <h1>Your Shopping Cart</h1>

  <div class="cart-item text-center">
    <img src="images/cookie.jpg"  alt="Product 1">
    <h3>Cookie</h3>
    <p>Price: shs 50000</p>
    <button class="remove-button">Remove</button>
  </div>

  <div class="cart-item">
    <img src="images/bans.jpg " alt="Product 2">
    <h3>Bans</h3>
    <p>Price: shs30,000</p>
    <button class="remove-button">Remove</button>
  </div>

  <div class="cart-total">
    <h2>Total: shs 180,000</h2>
  </div>

  <button class="checkout-button">Proceed to Checkout</button>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>
</html>

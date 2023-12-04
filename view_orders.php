<?php
include("includes/core.php");
$orders = new Order();
$users = new User();

try {
    $user_orders = $orders->getRelated('users', $orders->getUser($session->get('id')), 'user_id');
  } catch (\Throwable $th) {
    $user_orders = [];
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
  <title>Order Page</title>
  <style> 
       .ma{
        min-height:15vh;
       }
       .order{
        width: 100%;
        /* margin: 0 auto; */
        border-collapse: collapse;
        margin-top: 10rem;
       }
       
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            font-size: 12px;
        }
        th {
            background-color: rgb(76,9,9);
            color: white;
            font-size: 15px;
        }
        .view-button {
            background-color: green;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;

        }
    </style>
</head>
<body style="background-color:wheat">
  <?php
  include("navbar.php");
  ?>

<div class="ma"></div>

<section>
    <table class="order">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Status</th>
          <th>Delivery Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($user_orders as $order) : ?>
          <tr>
            <td><?php echo $order->id; ?></td>
            <td><?php echo $order->name; ?></td>
            <td><?php echo $order->quantity; ?></td>
            <td><?php echo $order->price; ?></td>
            <td><?php echo $order->status; ?></td>
            <td><?php echo $order->order_date; ?></td>
            <td>
              <a href="order_details.php"><button class="view-button">View Details</button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>







<?php
//   include 'footer.php';
  ?>
  <script src="main.js"></script>
</body>

</html>
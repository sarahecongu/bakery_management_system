<?php
include("includes/core.php");
$orders = new Order();
$users = new User();


// $orders->where(['user_id' => $session->get('id')]);

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
            /* border: 1px solid #ddd; */
        }
        th, td {
            padding: 12px;
            text-align: left;
            font-size: 12px;
        }
        th {
            /* background-color: rgb(76,9,9); */
            color: black;
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
          <th>Order No. </th>
          <th>Payment Method</th>
          <th>Status</th>
          <th>Order Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($orders->where(['user_id' => $session->get('id')]) as $order) : ?>
    <tr>
        <?php if ($order): ?>
            <td><?php echo $order->track_no; ?></td>
            <td><?php echo $order->payment_method; ?></td>
            <td><?php echo $order->status; ?></td>
            <td><?php echo Helper::date($order->created_at); ?></td>
            <td>
                <a href="order_details.php?id=<?php echo $order->id ?>"><button class="view-button">View Details</button></a>
            </td>
        <?php else: ?>
            <!-- <td colspan="7">No orders found.</td> -->
        <?php endif; ?>
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
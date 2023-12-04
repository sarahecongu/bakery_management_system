<?php
include("includes/core.php");
$orders = new Order();
$users = new User();

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $order_id = $_GET['id'];
  $order = $orders->find($order_id);
}

if (isset($_POST['order_update'])) {
  $data = [
    'track_no' => $_POST['track_no'],
    'user_id'=> $_POST['user_id'],
    'status'=> $_POST['status'],
    'payment_method'=> $_POST['payment_method'],
    'address'=> $_POST['address'],
    'total_amount'=> $_POST['total_amount'],
  ];

  try {
    if ($orders->update($_POST['id'], $data)) {
      Helper::statusMessage('success', 'order updated successfully');
    } else {
      Helper::statusMessage('error', 'Failed to update order');
    }

    // Redirect only after processing the update, not inside the if-else block
    header("Location: order_table.php");
    exit();
  } catch (Exception $e) {
    // Handle exceptions, log them, or display an error message as needed
    Helper::statusMessage('error', 'An error occurred during the update process.');
    // You may log the exception details to a file or database for debugging.
    // error_log($e->getMessage());
  }
}
?>

<?php include('partials/header.php'); ?>

<body>
  <?php
  include("sidebar.php");
  ?>
  <!-- header -->
  <div class="main-content">
    <div class="header-wrapper">
      <div class="header-title">
        <span>Welcome</span>
        <?php
        if (isset($_SESSION['last_name'])) {
          echo $_SESSION['last_name'];
        } else {
          echo "Guest";
        }
        ?>
      </div>
      <div class="user-info">
        <div class="search-box">
      
        </div>
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no" alt="pp">
        <li>
          <a href="login.php" class="logout-link">Logout</a>
        </li>
      </div>
    </div>

    <!-- tabular -->
    <div class="tabular-wrapper">
      <div class="table-container">
        <div class="col-md-9 ml-sm-auto col-md-10 px-md-4">
          <div class="container mt-5">
            <h2>Edit order</h2>
            <form action="update_order.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $order->id; ?>">
            
              <div class="mb-3">
              <select class="form-select" name="status">
                    <option value="" selected disabled>Select a status</option>
                    <?php foreach ($orders->all() as $cat): ?>
                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->status; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
             
              <div class="modal-footer">
                <a href="order_table.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                <button type="submit" class="bt" name="order_update">Update order</button>
              </div>
            </form>
          </div>
        </div>
        <?php
        include("partials/footer.php");
        ?>
      </div>
    </div>
  </div>
</body>

</html>

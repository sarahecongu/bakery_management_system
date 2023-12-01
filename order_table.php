
<?php
include("includes/core.php");
?>
<?php
$orders = new Order();
// Create
if (isset($_POST['add_order'])) {
  $data = [
    'track_no' => $_POST['track_no'],
    'user_id'=> $_POST['user_id'],
    'order_date'=> $_POST['order_date'],
    'status'=> $_POST['status'],
    'total_amount'=> $_POST['total_amount'],
  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  $orders->create($data);
  header("Location: order_table.php");
}

// Delete
if (isset($_POST['order_delete'])) {
  $order_id = $_POST['order_delete'];
  $orders->delete($order_id);
  header("Location: order_table.php");
  exit();
}
?>

<?php
include("partials/header.php");
?>

<body>
  <?php
  include("sidebar.php");
  ?>
  <!-- heasder -->
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
          <!-- <li>
          <a href="">
            <span>Home</span>
          </a>
        </li> -->
        </div>
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no"
          alt="pp">
          <li>
            <a href="login.php" class="logout-link">logout</a>
          </li>
      </div>
    </div>
    <!-- cards -->
    <?php
// include("cards.php");

    ?>
 <!-- tabular -->
 <div class="tabular-wrapper">
  <div class="table-container">

  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Order" style="width:350px; margin-right:10px;">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">user_id</th>
        <th scope="col">status</th>
        <th scope="col">track no</th>
        <th scope="col">total amount</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders->all() as $order): ?>
        <tr>
          <td>
            <?php echo $order->id; ?>
          </td>
          <td>
            <?php echo $order->user_id; ?>
          </td>
          <td>
            <?php echo $order->status; ?>
          </td>
        
          <td>
            <?php echo $order->track_no; ?>
          </td>
          
          <td>
            <?php echo $order->total_amount; ?>
          </td>
          <td>
            <?php  echo Helper::date($order->created_at); ?>
          </td>
          <td>
            <?php echo Helper::date($order->created_at); ?>
          </td>
          <td>
            <a href="order_table.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_order_table.php?id=<?php echo $order->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="order_table.php" method="POST" class="d-inline-block">
              <button type="submit" name="order_delete" value="<?php echo $order->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete order?')">
                <i class="bi bi-trash3">del</i>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>


  </div>
 </div>

  </div>
<?php 
include('partials/footer.php');
?>

<?php
include("includes/core.php");
?>
<?php
$order_details = new OrderItem();
$orders = new Order();
$products = new Product();
// Delete
if (isset($_POST['order_delete'])) {
  $order_id = $_POST['order_delete'];
  $order_details->delete($order_id);
  header("Location: order_details_table.php");
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
          <a href="logout.php" class="logout-link">logout</a>
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



  <!-- <table> -->
  <div class="search-box">
    <form action="order_details_table.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Order Item">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">order id</th>
        <th scope="col">product</th>
        <th scope="col">quantity</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($order_details->all() as $order):
                $order_detail = $products->getParentAttributesFromChild('order_items', 'products', $order->id, 'product_id');
                $order_na = $orders->getParentAttributesFromChild('order_items', 'orders', $order->id, 'order_id');


         ?>
        
        <tr>
          <td>
            <?php echo $order->id; ?>
          </td>
          <td>
            <?php echo $order_na->id; ?>
          </td>
          <td class="text-md-truncate" style="max-width:150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo $order_detail->name; ?>
        </td>
          <td>
            <?php echo $order->quantity; ?>
          </td>
        
          <td>
            <?php  echo Helper::date($order->created_at); ?>
          </td>
          <td>
            <?php  echo Helper::date($order->created_at); ?>
          </td>
          <td>
            <a href="order_details_table.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_order_table.php?id=<?php echo $order->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="order_details_table.php" method="POST" class="d-inline-block">
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
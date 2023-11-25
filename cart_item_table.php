
<?php
include("includes/core.php");
?>
<?php
$products = new Product;
$cart_items = new CartItem;

// Create
if (isset($_POST['add_cart_item'])) {
  $data = [
    'product_id' => $_POST['product_id'],
    'quantity'=> $_POST['quantity'],
    'cart_id'=> $_POST['cart_id'],
    'promotion_id'=> $_POST['promotion_id'],
  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  $cart_items->create($data);
  header("Location: cart_item_table.php");
}
// Delete
if (isset($_POST['cart_item_delete'])) {
  $cart_item_id = $_POST['cart_item_delete'];
  $cart_items->delete($cart_item_id);
  header("Location: cart_item_table.php");
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
        <h1>Dashboard</h1>
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


  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <!-- <th scope="col">total</th> -->
        <th scope="col">Qtty</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cart_items->all() as $cart_item): 
                $cart_details = $products->getParentAttributesFromChild('cart_items', 'products', $cart_item->id, 'product_id');
        // var_dump($cart_details->name);die;
        ?>

        <tr>
          <td>
            <?php echo $cart_item->id; ?>
          </td>
          <td style="width:15%">
            <img src="<?php echo $cart_details->image; ?>" alt="dp" class="w-50 h-50 rounded-circle">

          </td>
          <td title="<?php echo $cart_details->name; ?>" class="text-md-truncate" style="max-width:150px">
          <?php echo $cart_details->name; ?>
        </td>
          <td>
            <?php echo Helper::formatNumber($cart_details->price) ?? NULL; ?>
          </td>
         
        
          <td>
            <?php echo $cart_item->quantity; ?>
          </td>
         

          <td>
            <a href="cart_item_table.php" class="btn btn-primary btn-sm mr-2 m-1" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_cart_item_table.php?id=<?php echo $cart_item->id; ?>" class="btn btn-success btn-sm mr-2" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="cart_item_table.php" method="POST" class="d-inline-block">
              <button type="submit" name="cart_item_delete" value="<?php echo $cart_item->id;?>" class="btn btn-danger btn-sm m-2"
                onclick="return confirm('Are you sure you want to delete cart_item?')">
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
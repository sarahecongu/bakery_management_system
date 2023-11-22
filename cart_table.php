
<?php
include("includes/core.php");
$users = new User();
$carts = new Cart();
// Create
if (isset($_POST['add_cart'])) {
  $data = [
    'user_id' => $_POST['user_id']
    
  ];

  if ($carts->create($data)) {
    // Set success message
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'cart successfully added';
  } else {
    // Set error message
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Error adding cart';
  }

  header("Location: carts.php");
  exit();
}
// Delete
if (isset($_POST['cart_delete'])) {
  $cart_id = $_POST['cart_delete'];
  if($carts->delete($cart_id)){
    
    Helper::statusMessage('success','cart Deleted');
  }else{
   Helper::statusMessage('error','cart Not Deleted');
  }
  header("Location: carts.php");
  exit();
}
// searching
$searchedcarts = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchedcarts = $carts->where(['name' => $searchTerm]);
} else {
    $searchedcarts =  $carts->orderBy('id', 'DESC');
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

  <div class="text-center m-3">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD CART
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">carts</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="carts.php" method="POST" enctype="multipart/form-data">
          
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">User</label>
              <input type="text" class="form-control" name="user_id" placeholder="user id">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_cart">Add cart</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="cart.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search carts">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">User</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($searchedcarts as $cart): 
     $cart_details = $carts->getParentAttributesFromChild('carts', 'users', $cart->id, 'user_id');

        ?>
        
        <tr>
          <td>
            <?php echo $cart->id; ?>
          </td>
          <td>
            <?php echo $cart->user_id; ?>
          </td>
          
          <td>
            <?php 
          echo Helper::date($cart->created_at);
          ?>

          <td>
            <?php echo Helper::date($cart->updated_at); ?>
          </td>
          <td>
            <a href="view_cart.php?id=<?php echo $cart->id; ?>" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_cart.php?id=<?php echo $cart->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="cart.php" method="POST" class="d-inline-block">
              <button type="submit" name="cart_delete" value="<?php echo $cart->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete cart?')">
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
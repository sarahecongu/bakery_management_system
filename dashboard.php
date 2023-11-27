<?php
include("includes/core.php");
include("includes/sessionLimit.php");

$users = new User();
$categories = new Category();
$products = new Product();
$orders = new Order();
$deliveries = new Delivery();
$reviews = new Review();
$shifts = new Shift();
$inventory = new Inventory();


?>
<?php
include("partials/header.php");
?>
<?php
$users->count();
$categories->count();
$products->count();
$orders->count();
$deliveries->count();
$reviews->count();
$shifts->count();
$inventory->count();

$usersCount = $users->count();
$categoryCount= $categories->count();
$productCount= $products->count();
$orderCount= $orders->count();
$deliveryCount=$deliveries->count();
$reviewCount=$reviews->count();
$shiftCount=$shifts->count();
$inventoryCount=$inventory->count(); 
?>
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
        // Check if the 'last_name' key exists in the session
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
          <a href="login.php" class="logout-link">LogOut</a>
        </li>
      </div>
    </div>
    <!-- cards -->

    <div class="card-container">
      <h1 class="main-title text-center">Today's Data Summary</h1>
      <div class="card-wrapper">
        <div class="user-card bg-danger text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Users
              <i class="fas fa-user icon"></i>
              </span>
              <span class="value"><?php echo $usersCount; ?></span>
            </div>
          </div>
        </div>
         <!-- two -->
        <div class="user-card bg-dark text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
              Category
              <i class="fas fa-sitemap icon"></i>
              </span>

              <span class="value"><?php echo $categoryCount; ?></span>
            </div>
          </div>
        </div>
 <!-- three-->
 <div class="user-card bg-warning text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Products
              <i class="fas fa-box icon"></i>
              </span>
              <span class="value"><?php echo $productCount; ?></span>
            </div>
          </div>
        </div>

 <!-- three-->
        <div class="user-card bg-success text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Orders
              <i class="fas fa-shopping-cart icon"></i>
              </span>
              <span class="value"><?php echo $orderCount; ?></span>
            </div>
          </div>
        </div>


         <!-- three-->
 <div class="user-card bg-secondary text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Deliveries
              <i class="fas fa-truck icon"></i>
              </span>
              <span class="value"><?php echo $deliveryCount; ?></span>
            </div>
          </div>
        </div>
        <!-- three-->
        <div class="user-card bg-info text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Reviews
              <i class="fas fa-star icon"></i>
              </span>
              <span class="value"><?php echo $reviewCount; ?></span>
            </div>
          </div>
        </div>
          <!-- twelve -->
          <div class="user-card bg-primary text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
                Shifts
              <i class="fas fa-clock icon"></i>
              </span>
              <span class="value"><?php echo $shiftCount; ?></span>
            </div>
          </div>
        </div>
 <!-- three-->
 <div class="user-card bg-success text-white">
          <div class="card-header">
            <div class="total">
              <span class="title">
              Inventory
              <i class="fas fa-boxes icon"></i>
              </span>
              <span class="value"><?php echo $inventoryCount; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    // include("cards.php");
    ?>
    <!-- tabular -->
  </div>
  <!-- Rest of your HTML content -->
</body>
</html>

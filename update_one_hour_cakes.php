<?php
include("includes/core.php");
$one_hour_cakes = new OneHourCake;
$cake_categories = new CakeCategory;
$health_benefits = new HealthBenefit;

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $one_hour_cake_id = $_GET['id'];
  $one_hour_cake = $one_hour_cakes->find($one_hour_cake_id);

}

if (isset($_POST['one_hour_cake_update'])) {
  $data = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'cake_category_id' => $_POST['cake_category_id'],
    'health_benefit_id' => $_POST['health_benefit_id']
  ];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }

  // Use try-catch to handle exceptions, if any, during the update process
  try {
    if ($one_hour_cakes->update($_POST['id'], $data)) {
      Helper::statusMessage('success', 'one_hour_cake updated successfully');
    } else {
      Helper::statusMessage('error', 'Failed to update one_hour_cake');
    }

    // Redirect only after processing the update, not inside the if-else block
    header("Location: one_hour_cake_table.php");
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
          <!-- Uncomment the home link if needed -->
          <!-- <li>
              <a href="">
                  <span>Home</span>
              </a>
          </li> -->
        </div>
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no" alt="pp">
        <li>
          <a href="login.php" class="logout-link">Logout</a>
        </li>
      </div>
    </div>
    <!-- cards -->
   
    <!-- tabular -->
    <div class="tabular-wrapper">
      <div class="table-container">
        <div class="col-md-9 ml-sm-auto col-md-10 px-md-4">
          <div class="container mt-5">
            <h2>Edit one_hour_cake</h2>
            <form action="update_one_hour_cakes.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $one_hour_cake->id; ?>">
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Upload image">
              </div>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="one$one_hour_cake name"
                  value="<?php echo $one_hour_cake->name; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="one$one_hour_cake price"
                  value="<?php echo $one_hour_cake->price; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="one$one_hour_cake quantity"
                  value="<?php echo $one_hour_cake->quantity; ?>">
              </div>
              <div class="mb-3">
                <label for="category_id">Category:</label>
                <select id="category_id" name="cake_category_id">
                  <?php foreach ($cake_categories->all() as $data): ?>
                    <option value="<?php echo $data->id ?>" <?php if ($data->id == $one_hour_cake->cake_category_id) echo "selected"; ?>>
                      <?php echo $data->name ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="health_benefit_id">Health Benefit:</label>
                <select id="health_benefit_id" name="health_benefit_id">
                  <?php foreach ($health_benefits->all() as $data): ?>
                    <option value="<?php echo $data->id ?>" <?php if ($data->id == $one_hour_cake->health_benefit_id) echo "selected"; ?>>
                      <?php echo $data->name ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="modal-footer">
                <a href="one_hour_cake_table.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                <button type="submit" class="bt" name="one_hour_cake_update">Update</button>
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

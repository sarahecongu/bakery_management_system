<?php
include("includes/core.php");
$products = new Product();

$categories = new Category;
$health_benefits = new HealthBenefit;

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $product_id = $_GET['id'];
  $product = $products->find($product_id);
}
if (isset($_POST['product_update'])) {
  // var_dump($_POST);die;
  $data = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'category_id' => $_POST['category_id'],
    'health_benefit_id' => $_POST['health_benefit_id']

  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }

  $products->update($_POST['id'], $data);
  echo "product updated";
  header("Location: product_table.php");
  exit();

}

?>

<?php include('partials/header.php'); ?>

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
        <div class="col-md-9 ml-sm-auto col-md-10 px-md-4">
          <div class="container mt-5">
            <h2>Edit product</h2>
            <form action="update_product_table.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $product->id; ?>">
              <div class="mb-3">
                <label class="health_benefits">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image"
                  value="<?php echo $product->image; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="product name"
                  value="<?php echo $product->name; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="product name"
                  value="<?php echo $product->price; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="product name"
                  value="<?php echo $product->quantity; ?>">
              </div>
              
              <div class="mb-3">
              <label for="category_id">Category:</label>
              <select id="category_id" name="category_id">
                <?php foreach ($categories->all() as $data): ?>
                  <option value="<?php echo $data->id ?>" <?php if ($data->id == $product->category_id)
                      echo "selected"; ?>>
                    <?php echo $data->name ?>
                  </option>
                <?php endforeach ?>
              </select>
              </div>

              <div class="mb-3">
              <label for="health_benefit_id">Health Benefit:</label>
              <select id="health_benefit_id" name="health_benefit_id">
                <?php foreach ($health_benefits->all() as $data): ?>
                  <option value="<?php echo $data->id ?>" <?php if ($data->id == $product->health_benefit_id)
                      echo "selected"; ?>>
                    <?php echo $data->name ?>
                  </option>
                <?php endforeach ?>
              </select>
              </div>
              
                <div class="modal-footer">
                  <a href="product_table.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                  <button type="submit" class="bt" name="product_update">Update product</button>
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
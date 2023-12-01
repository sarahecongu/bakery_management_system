<?php
include("includes/core.php");
$products = new Product();
$promotions = new Promotion();

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $promotion_id = $_GET['id'];
  $promotion = $promotions->find($promotion_id);
}
if (isset($_POST['promotion_update'])) {
  $data = [
    'start_date' => $_POST['start_date'],
    'end_date'=> $_POST['end_date'],
    'description'=> $_POST['description'],
    'product_id'=> $_POST['product_id'],
  ];
  
  if($promotions->update($_POST['id'], $data)){
    Helper::statusMessage('success','promotion updated sucessfully');
    }
    else {
      Helper::statusMessage('success','category failed to update');
        
      }
      header("Location: promotion_table.php");
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
            <h2>Edit promotion</h2>
            <form action="update_promotion_table.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $promotion->id; ?>">
              <div class="mb-3">
                  <select class="form-select" name="image">
                    <option value="" selected disabled>Select an image</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->image; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
              <select class="form-select" name="product_id">
                    <option value="" selected disabled>Select a Product</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
              <select class="form-select" name="price">
                    <option value="" selected disabled>Select a Product</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->price; ?></option>
                    <?php endforeach; ?>
                </select>
              <div class="mb-3">
                <label class="form-label">start date</label>
                <input type="date" class="form-control" name="start_date" placeholder="promotion name"
                  value="<?php echo $promotion->start_date; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">End date</label>
                <input type="date" class="form-control" name="end_date" placeholder="promotion name"
                  value="<?php echo $promotion->end_date; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" class="form-control" name="description" placeholder="promotion name"
                  value="<?php echo $promotion->description; ?>">
              </div>
                <div class="modal-footer">
                  <a href="promotion_table.php" class="btn btn-secondary mr-5"><i class="fas fa-arrow-left"></i> Back</a> 
                  <button type="submit" class="bt mr-3" name="promotion_update">Update promotion</button>
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
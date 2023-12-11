
<?php
include("includes/core.php");
?>
<?php
$product_sub_categories = new ProductSubCategory;
$category = new Category;

// Create
if (isset($_POST['add_product_category'])) {
  $data = [
    'name' => $_POST['name'],
    'product_category_id'=> $_POST['product_category_id'],

  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  if ($product_sub_categories->create($data)) {
    // Set success message
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Product successfully added';
  } else {
    // Set error message
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Error adding category';
  }

  header("Location: product_sub_categories.php");
  exit();

}
// Delete
if (isset($_POST['product_sub_delete'])) {
  $product_sub_category_id = $_POST['product_sub_delete'];
  if($product_sub_categories->delete($product_sub_category_id)){
    
    Helper::statusMessage('success','Product Deleted');
  }else{
   Helper::statusMessage('error','Category Not Deleted');
  }
  header("Location: product_sub_categories.php");
  exit();
}
$searchedProduct_sub_category = [];

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchedProduct_sub_category = $product_sub_categories->where(['name' => $searchTerm])->orderBy('id', 'DESC')->all();
} else {
    $searchedProduct_sub_category = $product_sub_categories->orderBy('id', 'DESC');
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

  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD PRODUCT CATEGORY
    </button>
</div>


  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">PRODUCT SUB CATEGORY</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="product_sub_categories.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" placeholder="Enter image">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="product name">
            </div>
              <!-- price -->
              <div class="mb-3">
              <select class="form-select" name="product_category_id">
                    <option value="" selected disabled>Select a Category</option>
                    <?php foreach ($category->all() as $cat): ?>
                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_product_category">Add product</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
  <form action="product_sub_categories.php" method="GET" class="d-flex">
    <input type="text" class="form-control text-center" name="search" placeholder="Search product_sub_category" style="width:350px; margin-right: 10px; ">
    <button class="bt" type="submit">Search</button>
</form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($searchedProduct_sub_category as $product): 
                $category_details = $category->getParentAttributesFromChild('product_sub_categories', 'product_categories', $product->id, 'product_category_id');
                
        ?>

        <tr>
          <td>
            <?php echo $product->id; ?>
          </td>
          <td style="width:15%">
            <img src="<?php echo $product->image; ?>" alt="dp" class="w-50 h-50 rounded-circle">

          </td>
        <td title="<?php echo $product->name; ?>" class="text-md-truncate" style="max-width:150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo $product->name; ?>
        </td>

          <td>
            <?php echo $category_details->name ?? NULL; ?>
          </td>
          <td>
            <a href="product_sub_categories.php" class="btn btn-primary btn-sm mr-2 m-1" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_product_sub_categories.php?id=<?php echo $product->id; ?>" class="btn btn-success btn-sm mr-2" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="product_sub_categories.php" method="POST" class="d-inline-block">
              <button type="submit" name="product_sub_delete" value="<?php echo $product->id;?>" class="btn btn-danger btn-sm m-2"
                onclick="return confirm('Are you sure you want to delete product Categories?')">
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
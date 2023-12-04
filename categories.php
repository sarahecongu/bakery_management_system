
<?php
include("includes/core.php");
$users = new User();
$categories = new Category();
// Create
if (isset($_POST['add_category'])) {
  $data = [
    'name' => $_POST['name']
    
  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  if ($categories->create($data)) {
    // Set success message
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Category successfully added';
  } else {
    // Set error message
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Error adding category';
  }

  header("Location: categories.php");
  exit();
}
// Delete
if (isset($_POST['category_delete'])) {
  $category_id = $_POST['category_delete'];
  if($categories->delete($category_id)){
    
    Helper::statusMessage('success','Category Deleted');
  }else{
   Helper::statusMessage('error','Category Not Deleted');
  }
  header("Location: categories.php");
  exit();
}
// searching
$searchedCategories = [];
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchedCategories = $categories->where(['name' => $searchTerm]);
} else {
    $searchedCategories =  $categories->orderBy('id', 'DESC');
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
  <div class="text-end m-3 d-flex justify-content-between">

  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control" name="search" placeholder="Search Categories" style="width:350px;margin-right:10px;">
        <button class="bt" type="submit">Search</button>
    </form>
</div>
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD A CATEGORY
    </button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">CATEGORIES</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="categories.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" placeholder="Enter image">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Category name">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_category">Add Category</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
 

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($searchedCategories as $category): ?>
        <tr>
          <td>
            <?php echo $category->id; ?>
          </td>
          <td style="width:15%; height:5%">
            <img src="images/<?php echo $category->image; ?>" alt="dp" class="w-50 rounded-circle">

          </td>
          <td>
            <?php echo $category->name; ?>
          </td>
          
          <td>
            <?php 
          echo Helper::date($category->created_at);
          ?>

          <td>
            <?php echo Helper::date($category->updated_at); ?>
          </td>
          <td>
            <a href="view_categories.php?id=<?php echo $category->id; ?>" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_categories.php?id=<?php echo $category->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="categories.php" method="POST" class="d-inline-block">
              <button type="submit" name="category_delete" value="<?php echo $category->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete user?')">
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
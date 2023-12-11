<?php
include("includes/core.php");
$categories = new Category;

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $category_id = $_GET['id'];
  $category = $categories->find($category_id); 
 
}
if (isset($_POST['update_category'])) {
    $data = [
        'name' => $_POST['name'] 
        
    ];
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "images/".$image_name);
        $data['image'] = $image_name;
    }

    if($categories->update($_POST['id'], $data)){
    Helper::statusMessage('success','category updated sucessfully');
    }
    else {
      Helper::statusMessage('success','category failed to update');
        
      }
      header("Location: categories.php");
      exit();
    };
  
    
  

?>
<?php include('partials/header.php');?>

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
    <h2>Edit Category</h2>
                <form action="update_categories.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $category->id?>">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image"  value="<?php echo $category->image; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Category name"
                            value="<?= $category->name ?>">
                    </div>
                    
                    <div class="modal-footer">
                    <a href="categories.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="bt" name ="update_category">Update Category</button>
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
 
















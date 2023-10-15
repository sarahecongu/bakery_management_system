
<?php
include("includes/core.php");
?>
<?php
$categories = new Category();
// Create
if (isset($_POST['add_category'])) {
  $data = [
    'name' => $_POST['name'],
    'description' => $_POST['description']
  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  $categories->create($data);
  header("Location: categories.php");
}
// Delete
if (isset($_POST['category_delete'])) {
  $category_id = $_POST['category_delete'];
  $categories->delete($category_id);
  header("Location: categories.php");
  exit();
}


?>

<?php 
include('partials/header.php');



?>
  <div class="text-center">
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD CATEGORY
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
            <!-- last name -->
            <div class="mb-3">
              <label class="form-label">Description </label>
              <input type="textarea" class="form-control" name="description" placeholder="description of the product">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name = "add_category">Add Category</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <!-- <table> -->
  <table class="table table-striped">
    <thead class="bg-dark text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories->all() as $category): ?>
        <tr>
          <td>
            <?php echo $category->id; ?>
          </td>
          <td style="width:10%">
            <img src="images/<?php echo $category->image; ?>" alt="dp" class="rounded-circle w-50 h-50">

          </td>
          <td>
            <?php echo $category->name; ?>
          </td>
          <td>
            <?php echo $category->description; ?>
          </td>
          <td>
            <?php echo $category->created_at; ?>
          </td>
          <td>
            <?php echo $category->updated_at; ?>
          </td>
          <td>
            <a href="categories.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
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
  
<?php 

include('partials/footer.php');


?>
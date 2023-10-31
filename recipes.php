<?php
include("includes/core.php");
$recipes = new Recipe();
$api = new Api();

// Create
if (isset($_POST['add_recipe'])) {
  $data = [
    'name' => $_POST['name'],
    'instructions' => $_POST['instructions'],
    'author' => $_POST['author'],
    'description' => $_POST['description']
  ];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  };
  $recipes->create($data);
  header("Location: recipes.php");
}
// Delete
if (isset($_POST['recipe_delete'])) {
  $recipe_id = $_POST['recipe_delete'];
  $recipes->delete($recipe_id);
  header("Location: recipes.php");
  exit();
}
?>

<?php
    include('partials/header.php');
    ?>
  <div class="text-center m-3">
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD  RECIPE
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">RECIPES</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="recipes.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter start time">
            </div>
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" alt="img" placeholder="Enter image">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Author</label>
              <input type="text" class="form-control" name="author" placeholder="Enter end time">
            </div>
            <!-- last name -->
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="textarea" class="form-control" name="description" placeholder="description of the recipe">
            </div>
            <div class="mb-3">
              <label class="form-label">Instructions</label>
              <input type="textarea" class="form-control" name="instructions" placeholder="description of the recipe">
            </div>
            <div class="modal-footer">
              <!-- <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> -->
              <a href="recipes.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
              <button type="submit" class="btn btn-primary" name = "add_recipe">Add recipe</button>
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
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
        <th scope="col">Instructions</th>
        <th scope="col">Description</th>
        
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recipes->all() as $recipe): ?>
        <tr>
          <td>
            <?php echo $recipe->id; ?>
          </td>
          <td>
            <?php echo $recipe->name; ?>
          </td>
          <td style="width:10%">
            <img src="images/<?php echo $recipe->image; ?>" alt="dp" class="rounded-circle w-50 h-50">

          </td>
          <td>
            <?php echo $recipe->author;?>
          </td>
          <td>
            <?php echo $recipe->instructions;?>
          </td>
          <td>
            <?php echo $recipe->description;?>
          </td>
          <td>
            <?php echo $recipe->created_at;?>
          </td>
          <td>
            <?php echo $recipe->updated_at;?>
          </td>
          <td>
            <a href="recipes.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_recipe.php?id=<?php echo $recipe->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="recipes.php" method="POST" class="d-inline-block">
              <button type="submit" name="recipe_delete" value="<?php echo $recipe->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete delete recipe?')">
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
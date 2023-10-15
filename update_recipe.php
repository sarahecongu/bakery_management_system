<?php
include("includes/core.php");
$recipes = new Recipe();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $recipe_id = $_GET['id'];
  $recipe = $recipes->find($recipe_id); 
 
}
if (isset($_POST['update_recipe'])) {
    $data = [
        'name' => $_POST['name'],
        'instructions' => $_POST['instructions'],
        'author' => $_POST['author'],
        'description' => $_POST['description']
      ];
      if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "images/".$image_name);
        $data['image'] = $image_name;
    };
    $recipes->update($_POST['id'], $data);
    echo "recipe updated";
    header("Location: recipes.php");
    exit();
    
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>recipes</title>
  <style>
body{
    background-color: #f8f9fa;
  padding: 20px;
}
.modal-title {
  font-size: 1.5rem;
}
.modal-body {
  font-size: 1.2rem;
}
.modal-footer {
  justify-content: space-between;
}
.table {
  margin-top: 20px;
}
.table th, .table td {
  padding: 8px 12px;
}
.table {
  border-radius: 10px;
}

.btn {
  margin: 5px;
  
}
</style>

</head>
<body>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">
<div class="container mt-5">
    <h2>Edit recipe</h2>
                <form action="update_recipe.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $recipe->id;?>">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Update start time"  value="<?php echo $recipe->name; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" placeholder="Update recipe time"
                            value="<?= $recipe->author ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" alt="img" placeholder="Enter image"  value="<?php echo $recipe->image; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instructions</label>
                        <textarea class="form-control" name="instructions"
                            placeholder="instructions of the recipe"><?php echo $recipe->instructions ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            placeholder="Description of the recipe"><?php echo $recipe->description ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name ="update_recipe">Update recipe</button>
                    </div>
                </form>
</div>
</div>     

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>



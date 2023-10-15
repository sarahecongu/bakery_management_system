<?php
include("includes/core.php");
$categories = new Category();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $category_id = $_GET['id'];
  $category = $categories->find($category_id); 
 
}
if (isset($_POST['update_category'])) {
    $data = [
        'name' => $_POST['name'],  
        'description' => $_POST['description']
    ];
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "images/".$image_name);
        $data['image'] = $image_name;
    }

    $categories->update($_POST['id'], $data);
    echo "Category updated";
    header("Location: categories.php");
    exit();
    
  }

?>
<?php
	include("partials/header.php");
	?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">
<div class="container mt-5">
    <h2>Edit Category</h2>
                <form action="update_categories.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $category->id;?>">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image"  value="<?php echo $category->image; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Category name"
                            value="<?= $category->name ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            placeholder="Description of the product"><?php echo $category->description ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name ="update_category">Update Category</button>
                    </div>
                </form>
</div>
</div>     

<?php
	include("partials/footer.php");
	?>
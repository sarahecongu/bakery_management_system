<?php
include("includes/core.php");
$about = new  AboutUs;


if(isset($_GET['id']) && !empty($_GET['id'])) {
  $aboutus_id = $_GET['id'];
  $about_us = $about->find($aboutus_id); 
  
 
}
if (isset($_POST['update_about_us'])) {
    $data = [
        'title' => $_POST['title'] ,
        'description' => $_POST['description'] ,
        'total' => $_POST['total'] 

        
    ];
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "images/".$image_name);
        $data['image'] = $image_name;
    }

    if($about->update($_POST['id'], $data)){
    Helper::statusMessage('success','about_us updated sucessfully');
    }
    else {
      Helper::statusMessage('success','about_us failed to update');
        
      }
      header("Location: about.php");
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
    <h2>Edit <h2>
                <form action="update_aboutus.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $about_us->id;?>">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image"  value="<?php echo $about_us->image; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="title" placeholder="about_us name"
                            value="<?= $about_us->title ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description"
                            value="<?= $about_us->description ?>">
                    </div><div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="number" class="form-control" name="total" placeholder="Total"
                            value="<?= $about_us->total ?>">
                    </div>
                    
                    <div class="modal-footer">
                    <a href="aboutus_table.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="bt" name ="update_about_us">Update about_us</button>
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
 
















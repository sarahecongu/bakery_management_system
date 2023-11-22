<?php
include("includes/core.php");
$health_benefits = new HealthBenefit();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $health_benefit_id = $_GET['id'];
  $health_benefit = $health_benefits->find($health_benefit_id); 
 
}
if (isset($_POST['update_health_benefit'])) {
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description']
      ];
      
    $health_benefits->update($_POST['id'], $data);
    echo "health_benefit updated";
    header("Location: health_benefit.php");
    exit();
    
  }

?>


<?php include('partials/header.php');?>
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
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">
<div class="container mt-5">
    <h2>Edit health_benefit</h2>
                <form action="update_health_benefit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $health_benefit->id;?>">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Update start time"  value="<?php echo $health_benefit->name; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            placeholder="Description of the health_benefit"><?php echo $health_benefit->description ?></textarea>
                    </div>
                    <div class="modal-footer">
                    <a href="health_benefits.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="bt" name ="update_health_benefit">Update health_benefit</button>
                    </div>
                </form>
</div>
</div>     


<?php
	include("partials/footer.php");
	?>

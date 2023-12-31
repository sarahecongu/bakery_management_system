<?php
include("includes/core.php");
$health_benefits = new HealthBenefit();
// Create
if (isset($_POST['add_health_benefit'])) {
  $data = [
    'name' => $_POST['name'],

    'description' => $_POST['description']
  ];
  $health_benefits->create($data);
  header("Location: health_benefit.php");
}
// Delete
if (isset($_POST['health_benefit_delete'])) {
  $health_benefit_id = $_POST['health_benefit_delete'];
  $health_benefits->delete($health_benefit_id);
  header("Location: health_benefit.php");
  exit();
}
?>
<?php
include('partials/header.php');
?>

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
   <div class="table-container">
  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD HEALTH BENEFIT
    </button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">HEALTH BENEFIT</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="health_benefit.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter start time">
            </div>
           
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="textarea" class="form-control" name="description" placeholder="description of the health_benefit">
            </div>
    
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_health_benefit">Add health_benefit</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="health_benefit.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search recipe" style="width:350px;margin-right:10px;">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($health_benefits->all() as $health_benefit): ?>
        <tr>
          <td>
            <?php echo $health_benefit->id; ?>
          </td>
          <td>
            <?php echo $health_benefit->name; ?>
          </td>
          <td>
            <?php echo $health_benefit->description;?>
          </td>
        
          <td>
            <a href="health_benefit.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_health_benefit.php?id=<?php echo $health_benefit->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="health_benefit.php" method="POST" class="d-inline-block">
              <button type="submit" name="health_benefit_delete" value="<?php echo $health_benefit->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete delete health_benefit?')">
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
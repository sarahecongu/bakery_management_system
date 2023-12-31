
<?php
include("includes/core.php");
?>
<?php
$shifts = new Shift();
// Create
if (isset($_POST['add_shift'])) {
  $data = [
    'start_time' => $_POST['start_time'],
    'end_time' => $_POST['end_time'],
    'description' => $_POST['description']
  ];
  $shifts->create($data);
  header("Location: shift.php");
}
// Delete
if (isset($_POST['shift_delete'])) {
  $shift_id = $_POST['shift_delete'];
  $shifts->delete($shift_id);
  header("Location: shift.php");
  exit();
}
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
  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD A SHIFT
    </button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">SHIFTS</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="shift.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Start Time</label>
              <input type="text" class="form-control" name="start_time" placeholder="Enter start time">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">End Time</label>
              <input type="text" class="form-control" name="end_time" placeholder="Enter end time">
            </div>
            <!-- last name -->
            <div class="mb-3">
              <label class="form-label">Description </label>
              <input type="textarea" class="form-control" name="description" placeholder="description of the shift">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_shift">Add Shift</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control" name="search" placeholder="Search Shifts"  style="width:350px; margin-right: 10px; ">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($shifts->all() as $shift): ?>
        <tr>
          <td>
            <?php echo $shift->id; ?>
          </td>
          <td>
            <?php echo $shift->start_time; ?>
          </td>
          <td>
            <?php echo $shift->end_time;?>
          </td>
          <td>
            <?php echo $shift->description;?>
          </td>
          <td>
            <?php  echo Helper::date($shift->created_at); ?>
          </td>
          <td>
            <?php  echo Helper::date($shift->created_at); ?>
          </td>
          <td>
            <a href="shift.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_shift.php?id=<?php echo $shift->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="shift.php" method="POST" class="d-inline-block">
              <button type="submit" name="shift_delete" value="<?php echo $shift->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete delete shift?')">
                <i class="bi bi-trash3">del</i>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
  <?php
	include("partials/footer.php");
	?>



























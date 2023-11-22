<?php
include("includes/core.php");
?>
<?php
$schedule = new Schedule();
// Create
if (isset($_POST['add_schedule'])) {
  $data = [
    'user_id' => $_POST['user_id'],
    'shift_id' => $_POST['shift_id'],
    'date' => $_POST['date']
  ];
  $schedule->create($data);
  header("Location: schedule.php");
}
// Delete
if (isset($_POST['schedule_delete'])) {
  $Schedule_id = $_POST['schedule_delete'];
  $schedule->delete($Schedule_id);
  header("Location: schedule.php");
  exit();
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

  
  <div class="text-center m-3">
    <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD  SCHEDULE
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">SCHEDULE</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="schedule.php" method="POST">
            <div class="mb-3">
              <label class="form-label">User Id</label>
              <input type="text" class="form-control" name="user_id" placeholder="Enter ">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Schedule Id</label>
              <input type="text" class="form-control" name="shift_id" placeholder="Enter end time">
            </div>
            <!-- last name -->
            <div class="mb-3">
              <label class="form-label">date </label>
              <input type="date" class="form-control" name="date" placeholder="date of the Schedule">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_schedule">Add Schedule</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Categories">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">User Id</th>
        <th scope="col">Shift Id</th>
        <th scope="col">date</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($schedule->all() as $schedule): ?>
        <tr>
          <td>
            <?php echo $schedule->id;?>
          </td>
          <td>
            <?php echo $schedule->user_id; ?>
          </td>
          <td>
            <?php echo $schedule->shift_id;?>
          </td>
          <td>
            <?php echo $schedule->date;?>
          </td>
          <td>
            <a href="schedule.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_schedule.php?id=<?php echo $schedule->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="schedule.php" method="POST" class="d-inline-block">
              <button type="submit" name="schedule_delete" value="<?php echo $schedule->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete delete Schedule?')">
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


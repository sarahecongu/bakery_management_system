<?php
include("includes/core.php");
$schedules = new schedule();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $schedule_id = $_GET['id'];
  $schedule = $schedules->find($schedule_id); 
 
}
if (isset($_POST['update_schedule'])) {
    $data = [
        'user_id' => $_POST['user_id'],  
        'shift_id' => $_POST['shift_id'],  
        'date' => $_POST['date']
    ];
    $schedules->update($_POST['id'], $data);
    echo "schedule updated";
    header("Location: schedule.php");
    exit();
    
  }

?>

<?php include('partials/header.php');?>
<body>
<?php
  include("sidebar.php");
  ?>
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
   <div class="tabular-wrapper">
  <div class="table-container">
<div class="col-md-9 ml-sm-auto col-md-10 px-md-4">
<div class="container mt-5">
    <h2>Edit schedule</h2>
                <form action="update_schedule.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $schedule->id;?>">
                    <div class="mb-3">
                        <label class="form-label">User Id</label>
                        <input type="text" class="form-control" name="user_id" placeholder="Update start time"  value="<?php echo $schedule->user_id; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Shift Id<label>
                        <input type="text" class="form-control" name="shift_id" placeholder="Update schedule time"
                            value="<?php echo $schedule->shift_id; ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">date </label>
                      <input type="date" class="form-control" name="date" placeholder="date of the Schedule"><?php echo $schedule->date; ?>
                    </div>
                    <div class="modal-footer">
                    <a href="schedule.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="bt" name ="update_schedule">Update schedule</button>
                    </div>
                </form>
</div>
</div>     

</div>
</div>     

<?php
	include("partials/footer.php");
	?>


  </div>
 </div>

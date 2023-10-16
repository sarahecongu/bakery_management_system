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

  <title>Schedule</title>
  <style>
    body {
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

    .table th,
    .table td {
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
  <div class="text-center">
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#completeModal">
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
              <button type="submit" class="btn btn-primary" name = "add_schedule">Add Schedule</button>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>
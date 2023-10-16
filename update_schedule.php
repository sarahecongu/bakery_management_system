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

  <title>schedules</title>
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
                            value="<?= $schedule->shift_id; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">date</label>
                        <textarea class="form-control" name="date"
                            placeholder="date of the schedule"><?php echo $schedule->date; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name ="update_schedule">Update schedule</button>
                    </div>
                </form>
</div>
</div>     

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>



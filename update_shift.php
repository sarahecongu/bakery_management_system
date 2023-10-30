<?php
include("includes/core.php");
$shifts = new Shift();

if(isset($_GET['id']) && !empty($_GET['id'])) {
  $shift_id = $_GET['id'];
  $shift = $shifts->find($shift_id); 
 
}
if (isset($_POST['update_shift'])) {
    $data = [
        'start_time' => $_POST['start_time'],  
        'end_time' => $_POST['end_time'],  
        'description' => $_POST['description']
    ];
    $shifts->update($_POST['id'], $data);
    echo "shift updated";
    header("Location: shift.php");
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

  <title>shifts</title>
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
    <h2>Edit shift</h2>
                <form action="update_shift.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $shift->id;?>">
                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="text" class="form-control" name="start_time" placeholder="Update start time"  value="<?php echo $shift->start_time; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="text" class="form-control" name="end_time" placeholder="Update shift time"
                            value="<?= $shift->end_time ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            placeholder="Description of the shift"><?php echo $shift->description ?></textarea>
                    </div>
                    <div class="modal-footer">
                    <a href="shift.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary" name ="update_shift">Update shift</button>
                    </div>
                </form>
</div>
</div>     

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>



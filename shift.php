
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
<?php 
include('partials/header.php');
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
  <link rel="stylesheet" href="../css/dashboard.css">

  <title>END OF YEAR</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      box-sizing: border-box;
    }

    body {
      display: flex;
    }

    .sidebar {
      position: sticky;
      top: 0;
      left: 0;
      bottom: 0;
      width: 170px;
      height: 100vh;
      padding: 0 1.7rem;
      color: whitesmoke;
      overflow: hidden;
      transition: all 0.5s linear;
      background-color: #361401;
      overflow: auto;

    }

    .sidebar:hover {
      width: 260px;
      transition: 0.5s;
    }


    .logo {
      height: 80px;
      padding: 16px;

    }

    .menu {
      height: 80%;
      position: relative;
      list-style: none;
      padding: 0;
    }

    .menu li {
      padding: 1rem;
      margin: 8px 0;
      border-radius: 8px;
      transition: all 0.5s ease-in-out;
    }

    .menu li:hover,
    .active {
      background-color: orange;
      /* width: 10px; */
    }

    .menu a {
      color: white;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .menu a span {
      overflow: hidden;
    }

    .menu a i {
      font-size: 1.2rem;
    }

    .logout {
      position: absolute;
      /* bottom: 0; */
      left: 0;
      width: 100%;
    }

    /* main */
    .main-content {
      position: relative;
      background: gray;
      width: 100%;
      padding: 1rem;
    }

    .header-wrapper img {
      width: 50px;
      height: 50px;
      cursor: pointer;
      border-radius: 50%;
    }

    .header-wrapper {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
      background: white;
      border-radius: 10px;
      padding: 10px 2rem;
      margin-bottom: 1rem;
    }

    .header-title {
      color: blue;

    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 1;

    }

    /* cards */
    .card-container{
      background-color: #fff;
      padding: 2rem;
      border-radius: 10px;

    }

    .card-wrapper{
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .main-title{
      color: blue;
      padding-bottom: 10px;
      font-size: 15px;
    }

    .user-card{
      /* background: red; */
      border-radius: 10px;
      padding: 1.2rem;
      width: 220px;
      height: 150px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.5s ease-in-out;
      /* margin: auto; */
    }

    .payment-card:hover {
      transform: translateY(-5px);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-self: center;
      margin-bottom: 20px;
    }

    .total {
      display: flex;
      flex-direction: column;
    }

    .title {
      font-size: 22px;
      font-weight: bold;
    }

    .value {
      font-size: 24px;
      font-weight: bold;
    }
 .icon {
      color: white;
      padding: 1rem;
      height: 60px;
      width: 60px;
      /* text-align: center; */
      /* border-radius: 50%; */
      font-size: 1.5rem;
      /* background: white; */
    }

.tabular-wrapper{
  background: white;
  margin-top: 1rem;
  border-radius: 10px;
  padding: 2rem;
}
.table-container{
  width: 100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
</style>

</head>

<body>
  <?php
  include("sidebar.php");
  ?>
  <!-- heasder -->
  <div class="main-content">
    <div class="header-wrapper">
      <div class="header-title">
        <span>Welcome</span>
        <h1>Dashboard</h1>
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
      </div>
    </div>
    <!-- cards -->
    <?php
// include("cards.php");

    ?>
 <!-- tabular -->
 <div class="tabular-wrapper">
  <div class="table-container">
  <div class="text-center">
    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD SHIFT
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
              <button type="submit" class="btn btn-primary" name = "add_shift">Add Shift</button>
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
            <?php echo $shift->created_at;?>
          </td>
          <td>
            <?php echo $shift->updated_at;?>
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



























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

  <title>Bakers</title>
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
<!-- Button trigger modal -->
<div class="text-center">
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
  ADD CATEGORIES
</button>
</div>
<div class="input-group flex-nowrap">
  <input type="text" class="form-control" placeholder="searchbar......" aria-label="Username">
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <!-- firstname -->
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" placeholder="Enter first name">
        </div>
           <!-- image -->
        <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image" placeholder="Enter profile pic">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
        <button type="button" class="btn btn-primary">Add Category</button>
      </div>
      </div>
    </div>
  </div>
</div>
</form>
<!-- <table> -->
<table class="table table-striped">
  <thead class="bg-dark text-white">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>

     
  
    

      <td>
      <a href="" class="mr-3" title="view"><i class="fas fa-eye"></i></a>
      <a href="" class="mr-3" title="edit" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></a>
        <a href="" class="mr-3" title="delete"><i class="fas fa-trash"></i></a>
</td>
      </tr>
    
  </tbody>
  <!-- two -->
  
  
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>
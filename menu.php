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
  <link rel="stylesheet" href="./css/styles.css">
    <title>menu</title>
</head>
<body>
    
</body>
</html>


<!-- // <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
//     integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
//   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
//     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
//     crossorigin="anonymous" referrerpolicy="no-referrer" />
//   <link rel="stylesheet" href="./styles/styles.css">
  

//     <title>menu</title>
//     <style>
//         .navbar {
//     background-color: #361401;
//     color: white;
//     padding: 10px;
  
    
//   }
// /* logo */
//   .mt-30{
//     margin-top: 30px;
//   }
  
//   .carousel-item {
//     height: 500px;

//   }
// .carousel-caption h5 {
//     font-size: 2rem;
//     margin-bottom: 10px;
//   }

//   .carousel-caption p {
//     font-size: 1.2rem;
//     margin-bottom: 0;
//   }


//   .carousel-control-prev,
//   .carousel-control-next {
//     width: 5%;
//   }

// /* promotions */

//   .promotional-bar {
//     background-color: #ffcc00;
//     color: #333;
//     padding: 8px;
//     display: flex;
//     align-items: center;
    
//   }

//   .close-button {
//     background: none;
//     border: none;
//     font-size: 20px;
//     cursor: pointer;
//     color: #333;
//     display: none;
//   }
//     .form-group {
//         max-width: 400px;
//         margin: 0 auto;
//     }

//     .form-control {
//         width: 100%;
//     }
// </style>


//     </style> -->

<div class="fixed-top">
    <!--Promotions-->
    <?php
    include('promotions.php');
    ?>

     <!-- navbar -->
    <?php
    include('navbar.php');
     ?>
     <!-- navbar -->
  
</div>


<div class="container-box mx-auto">
<h4 class="text-center">Our Cake Products</h4>
<div class="form-group">
<input class="form-control"placeholder="Search for Products...">
</div>
    
        <div class="row row-cols-1 row-cols-md-5 g-2 mt-2">
            <?php 
            for ($i = 0; $i < 24; $i++) { 
                echo '
                <div class="col  mx-auto m-2">
                    <div class="card text-center">
                        <img src="./images/CAKE2.jpg" class="card-img-top" alt="...">
                        <h5 class="card-title">Chocolate Cake</h5>
                        <p class="card-text">UGX 150,000</p>
                        <div class="card-body text-center mt-0">

                            <div class="stars text-warning ">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-alt" aria-hidden="true"></i>
                                </div>
                            <a href="" class="btn btn-dark text-white mt-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</a>
                            
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>
</html>



<?php
include('includes/core.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Our Services</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
</head>
    <style>
        /* Add your CSS styles here */
        .services-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            padding: 30px;
        }
        .service-card {
            background-color: wheat;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .service-image {
            max-width: 100%;
            height: auto;
            border-radius: 50px;
        }
        .spaced{
            background: white;
            height: 15vh;
        }
        h2{
            font-size: 30px;
            text-align: center;
            color:rgb(76, 9, 9);

        }
        p{
            font-size: 15px;
        }
    </style>
</head>
<body>
    

    <?php
    include("navbar.php");
    ?>

    


    <div class="spaced"></div>
        <h2>Our Services</h2>
        <section class="services-container">
            
            <?php
            // Sample array of services with information and images
            $services = [
                ["Delivery Services", "Door to Door Derlivery.We do 24 hour delivery of orders to wherever you want.", "images/deliveryman.png"],
                ["Cupcakes,all pastries", "Delicious and decorative pastries such as cupcakes for birthdays and events.", "images/cupcake.jpg"],
                ["Cakes For All Occassions", "A selection of sweet and savory cakes to satisfy your cravings.", "images/chris.jpg"],
                ["Customer Orders", "We welcome customer orders to fulfill your unique bakery needs.", "images/customers.png"],
        
            ];

            // Loop to display service cards with images
            foreach ($services as $service) {
                echo '<div class="service-card">';
                echo '<img class="service-image w-50" src="' . $service[2] . '" alt="' . $service[0] . '">';
                echo '<h2>' . $service[0] . '</h2>';
                echo '<p>' . $service[1] . '</p>';
                echo '</div>';
            }
            ?>
        </section>
    

    <?php
 include("footer.php");
 ?>
</body>
</html>

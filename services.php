<!DOCTYPE html>
<html>
<?php
require_once('includes/core.php');
$services = new Service;
?>

<head>
    <title>Our Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .spa {
            min-height: 25vh;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
        }

        .services-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            background: wheat;
        }

        .service-card {
            width: calc(33.33% - 20px);
            /* Adjust the width to fit three cards in a row with spacing */
            margin: 10px;
            text-align: center;
            position: relative;
        }

        .service-card img {
            width: 100%;
            margin-top: 2rem;
            height: auto;
            object-fit: cover;
            max-height: 200px;
        }

        .service-card hr,
        .service-card p {
            margin: 5px 0;
            font-size: 1.2rem;

        }

        h3 {
            font-size: 1.5rem;

        }

        h2 {
            background: wheat;
            color: rgb(76, 9, 9);

        }

        @media (width < 900px) {
            .services-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            .service-card img {
            width: 100%;
            margin-top: 2rem;
            height: auto;
            object-fit: cover;
            max-height: 200px;
        }
        }

        @media (width < 600px) {
            .services-container {
                grid-template-columns: repeat(1, 1fr);
            }
            .service-card img {
            width: 100%;
            margin-top: 2rem;
            height: auto;
            object-fit: cover;
            max-height: 200px;
        }
        }
    </style>
</head>

<body>

    <?php include("navbar.php"); ?>
    <div class="spa"></div>
    <h2>OUR SERVICES</h2>
    <section class="services-container">
        <?php foreach ($services->all() as $service): ?>
            <div class="service-card">
                <img src="images/<?php echo $service->image; ?>" alt="user" />
                <hr>
                <h3>
                    <?php echo $service->name; ?>
                </h3>
                <p class="name">
                    <?php echo $service->description; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include("footer.php"); ?>
</body>

</html>